<?php

namespace App\Http\Controllers\Api\ChatRoom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ChatRoom;
use App\Models\ChatRoomMember;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\Response\ResponseController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatRoomController extends ResponseController
{
    public function createChatRoom(Request $request)
    {
        try {
            $statusBrand = array(
                'name' => 'required',
                'user_id' => 'required',
            );

            $messages = array(
                'name.required' => 'Please Enter Name',
                'user_id.required' => 'Please Enter User id',
            );


            $validator = Validator::make($request->all(), $statusBrand, $messages);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->first());
            }

            $createLink = Str::random(20);
            $checkLink = ChatRoom::where('link', $createLink)->first();
            if ($checkLink) {
                $createLink = Str::random(10) . time();
            }
            $createChatRoom = new ChatRoom;
            $createChatRoom->user_id = $request->user_id;
            $createChatRoom->name = $request->name;
            $createChatRoom->link = $createLink;
            $createChatRoom->description = $request->description;
            $createChatRoom->last_chat_date_time = date("Y-m-d H:i:s");
            $createChatRoom->save();

            $chatRoomMember = new ChatRoomMember;
            $chatRoomMember->user_id = $request->user_id;
            $chatRoomMember->chat_room_id = $createChatRoom->id;
            $chatRoomMember->save();


            if (!empty($createChatRoom)) {
                $createChatRoomData = [];
                $createChatRoomData['id'] = !empty($createChatRoom->id) ? (string) $createChatRoom->id : '';
                $createChatRoomData['user_id'] = !empty($createChatRoom->user_id) ? (string) $createChatRoom->user_id : '';
                $createChatRoomData['name'] = !empty($createChatRoom->name) ? (string) $createChatRoom->name : '';
                $createChatRoomData['link'] = !empty($createChatRoom->link) ? (string) $createChatRoom->link : '';
                $createChatRoomData['created_at'] = !empty($createChatRoom->created_at) ? (string) $createChatRoom->created_at : '';

                return $this->sendResponse($createChatRoomData, 'Chat Room Added Successfully');
            }
        } catch (Exception $e) {
            Log::info("Create Chat Room API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
    public function getChatList(Request $request)
    {
        try {
            $statusBrand = array(
                'user_id' => 'required',
            );

            $messages = array(
                'user_id.required' => 'Please Enter User id',
            );

            $validator = Validator::make($request->all(), $statusBrand, $messages);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->first());
            }
            $userType = User::where('id', $request->user_id)->where('type', 1)->where('status', 1)->first();
            if (isset($userType) && !empty($userType)) {
                $chatlists = ChatRoomMember::orderBy('id', 'DESC')->get();
                $chatlist = [];
                $chatlist['id'] = !empty($chatlists->id) ? (string) $chatlists->id : '';
                $chatlist['user_id'] = !empty($chatlists->user_id) ? (string) $chatlists->user_id : '';
                $chatlist['chat_room_id'] = !empty($chatlists->chat_room_id) ? (string) $chatlists->chat_room_id : '';
                return $this->sendResponse($chatlists, 'Chatlists');
            } else {
                $chatlists = ChatRoomMember::where('user_id', $request->user_id)->orderBy('id', 'DESC')->get();
                $chatlist = [];
                $chatlist['id'] = !empty($chatlists->id) ? (string) $chatlists->id : '';
                $chatlist['user_id'] = !empty($chatlists->user_id) ? (string) $chatlists->user_id : '';
                $chatlist['chat_room_id'] = !empty($chatlists->chat_room_id) ? (string) $chatlists->chat_room_id : '';

                return $this->sendResponse($chatlists, 'Chatlists');
            }
        } catch (Exception $e) {
            Log::info("Get Chat List API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
    public function addUserRoom(Request $request)
    {
        try {
            $statusBrand = array(
                'user_id' => 'required',
                'link' => 'required',
            );

            $messages = array(
                'user_id.required' => 'Please Enter User id',
                'link.required' => 'Please Enter link',

            );

            $validator = Validator::make($request->all(), $statusBrand, $messages);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->first());
            }

            $linkCheck = ChatRoom::where('link', $request->link)->first();
            if (!empty($linkCheck)) {
                $checkUser = User::where('id', $request->user_id)->first();

                if (!empty($checkUser)) {
                    $chatRoomMember = ChatRoomMember::where('user_id', $request->user_id)->where('chat_room_id', $linkCheck->id)->first();
                    if (!empty($chatRoomMember)) {
                        return $this->sendError('User Already Added');
                    } else {
                        $chatRoomMember = ChatRoomMember::where('user_id', $request->user_id)->where('chat_room_id', $linkCheck->id)->onlyTrashed()->first();
                        if (!empty($chatRoomMember)) {
                            return $this->sendError('You can not join this group');
                        }
                        $chatRoomMember = new ChatRoomMember;
                        $chatRoomMember->user_id = $request->user_id;
                        $chatRoomMember->chat_room_id = $linkCheck->id;
                        $chatRoomMember->save();

                        if (!empty($chatRoomMember)) {
                            $createChatRoomData = [];
                            $createChatRoomData['id'] = !empty($chatRoomMember->id) ? (string) $chatRoomMember->id : '';
                            $createChatRoomData['user_id'] = !empty($chatRoomMember->user_id) ? (string) $chatRoomMember->user_id : '';
                            $createChatRoomData['chat_room_id'] = !empty($chatRoomMember->chat_room_id) ? (string) $chatRoomMember->chat_room_id : '';
                            return $this->sendResponse($createChatRoomData, 'Chat Room Added Successfully');
                        }
                    }
                } else {
                    return $this->sendError('User Not Found');
                }
            } else {
                return $this->sendError('Link Not Found');
            }
        } catch (Exception $e) {
            Log::info("Add User Room API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
    public function getChatRoomMember(Request $request)
    {
        try {
            $statusBrand = array(
                'chat_room_id' => 'required',
            );

            $messages = array(
                'chat_room_id.required' => 'Please Enter Chat Room Id',
            );

            $validator = Validator::make($request->all(), $statusBrand, $messages);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->first());
            }
            $getMessage = ChatRoomMember::where('chat_room_id', $request->chat_room_id)->get();
            if (!empty($getMessage)) {
                $getMessagesData = array();
                foreach ($getMessage as $getMessages) {
                    $messagesData = [];
                    $messagesData['id'] = !empty($getMessages->id) ? (string) $getMessages->id : '';
                        $messagesData['user_id'] = !empty($getMessages->user_id) ? (string) $getMessages->user_id : '';
                        $messagesData['user_name'] = !empty($getMessages->user) ? (string) $getMessages->user->name : '';
                        $messagesData['user_log'] = !empty($getMessages->user) ? (string) $getMessages->user->logged_in : '';
                        $messagesData['chat_room_id'] = !empty($getMessages->chat_room_id) ? (string) $getMessages->chat_room_id : '';
                    array_push($getMessagesData, $messagesData);
                }
                return $this->sendResponse($getMessagesData, 'ChatRoom Member Fetch Successfully');
            }
        } catch (Exception $e) {
            Log::info("Get Chat Room Member API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }

    public function deleteChatRoom(Request $request)
    {
        try {
            $statusBrand = array(
                'chat_room_id' => ['required', 'exists:chat_rooms,id'],
            );

            $messages = array(
                'chat_room_id.required' => 'Please Enter Chat Room Id',
            );

            $validator = Validator::make($request->all(), $statusBrand, $messages);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->first());
            }
            $chatRoom = ChatRoom::where('id', $request->chat_room_id)->first();
            $attachmentMessages = Message::where('chat_room_id', $chatRoom->id)->where('attachment', '!=', null)->get();
            if (count($attachmentMessages) > 0) {
                foreach ($attachmentMessages as $attachmentMessage) {
                    if (Storage::exists($attachmentMessage->attachment)) {
                        Storage::delete($attachmentMessage->attachment);
                    }
                }
            }
            $chatRoom->latestMessages()->delete();
            $chatRoom->delete();
            return $this->sendResponse("", 'ChatRoom Deleted');
        } catch (Exception $e) {
            Log::info("Delete Chat Room API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
    public function leaveChatRoomMember(Request $request)
    {
        try {
            $statusBrand = array(
                'chat_room_id' => ['required', 'exists:chat_rooms,id'],
                'user_id' => ['required', 'exists:users,id'],
            );
            $messages = array(
                'chat_room_id.required' => 'Please Enter Chat Room Id',
            );
            $validator = Validator::make($request->all(), $statusBrand, $messages);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->first());
            }
            $chatRoomMember = ChatRoomMember::where('chat_room_id', $request->chat_room_id)->where('user_id', $request->user_id)->first();
            if ($chatRoomMember) {
                $chatRoomMember->delete();
            }
            return $this->sendResponse("", 'Member Leave From Room');
        } catch (Exception $e) {
            Log::info("Leave Chat Room API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
}
