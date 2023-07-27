<?php

namespace App\Http\Controllers\User;

use App\Enums\StatusEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\ChatRoomMember;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('addChatRoom');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chats = ChatRoom::whereHas('chatRoomMembers', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->orderBy('last_chat_date_time', 'desc')->get();
        $latestMessageId = "";
        if (count($chats) > 0) {
            $latestMessageId =  $chats[0]->id;
        }
        if ($request->ajax()) {
            return view('pages.user.chat.list', compact('chats'));
        }
        return view('pages.user.chat.index', compact('chats', 'latestMessageId'));
    }

    public function createChat(Request $request)
    {
        $url = Helper::getBaseUrl() . "room/create";
        $post = $request->all();
        $post['user_id'] = Auth::user()->id;
        $response = Helper::curlPostAPICall($post, $url);
        $response = json_decode($response);
        if ($response->status == StatusEnum::API_ERROR_STATUS) {
            return redirect()->back()->with('error', $response->message);
        } else {
            return redirect()->back()->with('success', $response->message);
        }
    }

    public function messageDetails(Request $request)
    {
        $url = Helper::getBaseUrl() . "room/get-chat";
        $post = $request->all();
        $post['chat_room_id'] = $request->roomId;
        $messages = Helper::curlPostAPICall($post, $url);
        $messages = json_decode($messages);
        if ($messages->status == StatusEnum::API_ERROR_STATUS) {
            return response()->json(["status" => 400, "message" => $messages->message]);
        } else {
            $chatRoom = ChatRoom::where('id', $request->roomId)->first();
            return view('pages.user.chat.details', compact('chatRoom', 'messages'));
        }
    }
    public function getattachment(Request $request)
    {
        $url = Helper::getBaseUrl() . "getchatroommember";
        $post = $request->all();
        $post['chat_room_id'] = $request->roomId;
        $messages = Helper::curlPostAPICall($post, $url);
        $messages = json_decode($messages);

        if ($messages->status == StatusEnum::API_ERROR_STATUS) {
            return response()->json(["status" => 400, "message" => $messages->message]);
        } else {
            $chatRoom = ChatRoom::find($request->roomId);
            $chatAttachment = Message::where('chat_room_id', $request->roomId)->where('attachment','!=',null)->get();
            return view('pages.user.chat.chatdetails', compact('messages', 'chatAttachment', 'chatRoom'));
        }
    }

    public function storeMessage(Request $request)
    {
        $roomId = $request->roomId;
        $url = Helper::getBaseUrl() . "room/message";
        $post = $request->all();
        $post['sender_id'] = Auth::user()->id;
        $post['chat_room_id'] = $request->roomId;

        if ($request->attachment) {
            if ($_FILES['attachment']['tmp_name']) {
                $post['attachment'] = new \CurlFile(
                    $_FILES['attachment']['tmp_name'],
                    $_FILES['attachment']['type'],
                    $_FILES['attachment']['name']
                );
            } else {
                $post['attachment'] = "";
            }
        }
        $messages = Helper::curlPostAPICall($post, $url);
        $messages = json_decode($messages);
        if ($messages->status == StatusEnum::API_ERROR_STATUS) {
            return response()->json(["status" => 400, "message" => $messages->message]);
        } else {
            $url = Helper::getBaseUrl() . "room/get-chat";
            $post = $request->all();
            $post['chat_room_id'] = $request->roomId;
            $messages = Helper::curlPostAPICall($post, $url);
            $messages = json_decode($messages);
            if ($messages->status == StatusEnum::API_ERROR_STATUS) {
                return response()->json(["status" => 400, "message" => $messages->message]);
            } else {
                $chatRoom = ChatRoom::where('id', $request->roomId)->first();
                $chatDetails = view('pages.user.chat.details', compact('chatRoom', 'messages'))->render();
                $chatRoomMembers = User::whereHas('chatRoomMembers',  function ($query) use ($roomId) {
                    $query->where('chat_room_id', $roomId);
                })->select('socket_id')->whereNotNull('socket_id')->get();
                $socketIdMembers = [];
                if(count($chatRoomMembers) > 0)
                {
                    foreach($chatRoomMembers as $chatRoomMember)
                    {
                        $socketIdMembers[] = $chatRoomMember->socket_id;
                    }
                }
                return response()->json(["status" => 200, "message" => $chatDetails, 'socket_ids' => $socketIdMembers]);
            }
        }
    }
    public function addChatRoom(Request $request, $link)
    {
        if (!empty(Auth::user()->id)) {
            $url = Helper::getBaseUrl() . "room/add-user";
            $post = $request->all();
            $post['user_id'] = Auth::user()->id;
            $post['link'] = $link;
            $response = Helper::curlPostAPICall($post, $url);
            $response = json_decode($response);
            if ($response->status == StatusEnum::API_ERROR_STATUS) {
                return redirect()->back()->with('error', $response->message);
            } else {
                return redirect()->route('home');   
            }
        } else {
            return view('auth.user-register', compact('link'));
        }
    }

    public function deleteChatRoom(ChatRoom $chatRoom)
    {
        $url = Helper::getBaseUrl() . "room/delete";
        $post['chat_room_id'] = $chatRoom->id;
        $response = Helper::curlPostAPICall($post, $url);
        $response = json_decode($response);
        if ($response->status == StatusEnum::API_ERROR_STATUS) {
            return response()->json(["status" => 200, "message" => $response->message]);
        } else {
            return response()->json(["status" => 200, "message" => "Room Deleted"]);
        }
    }

    public function leaveChatRoom(ChatRoom $chatRoom, User $user)
    {
        $url = Helper::getBaseUrl() . "room/leave";
        $post['chat_room_id'] = $chatRoom->id;
        $post['user_id'] = $user->id;
        $response = Helper::curlPostAPICall($post, $url);
        $response = json_decode($response);
        if ($response->status == StatusEnum::API_ERROR_STATUS) {
            return response()->json(["status" => 200, "message" => $response->message]);
        } else {
            return response()->json(["status" => 200, "message" => "Member Removed"]);
        }
    }
}
