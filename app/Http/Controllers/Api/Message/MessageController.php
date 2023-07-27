<?php

namespace App\Http\Controllers\Api\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\Response\ResponseController;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Storage;

class MessageController extends ResponseController
{
    public function sendMessage(Request $request)
    {
        try {
            $statusBrand = array(
                'sender_id' => 'required',
                'chat_room_id' => 'required',
            );

            $messages = array(
                'sender_id.required' => 'Please Enter Sender Id',
                'chat_room_id.required' => 'Please Enter Chat Room Id',
            );

            $validator = Validator::make($request->all(), $statusBrand, $messages);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->first());
            }

            $messageData = new Message;
            $messageData->sender_id = $request->sender_id;
            $messageData->chat_room_id = $request->chat_room_id;
            $messageData->messages = $request->message ? encrypt($request->message) : null;
            if ($request->attachment) {
                $attachment = $request->file('attachment');
                $mediaPath = Storage::put('/' . $request->sender_id, $attachment, 'public');
                Storage::put('/' . $request->sender_id, $attachment, 'public');
                $messageData->attachment = $mediaPath;
            }
            $messageData->save();
            $chatRoom = ChatRoom::where('id', $request->chat_room_id)->first();
            if ($chatRoom) {
                $chatRoom->last_chat_date_time = date("Y-m-d H:i:s");
                $chatRoom->save();
            }
            if (!empty($messageData)) {
                $messageResponse['id'] = $messageData->id ? $messageData->id : '';
                // $messageResponse['sender_id'] = $messageData->sender_id ? (string) $messageData->sender_id : '';
                // $messageResponse['chat_room_id'] = $messageData->chat_room_id ? (string) $messageData->chat_room_id : '';
                // $messageResponse['message'] = $$messageData->messages ? (string) decrypt($messageData->messages) : '';
                // $messageResponse['attachment'] = $messageData->attachment ? (string) asset('storage/' . $messageData->attachment) : '';
                // $messageResponse['date_time'] = $messageData->created_at ? (string) $messageData->created_at : '';
                return $this->sendResponse($messageResponse, 'Message send Successfully');
            }
        } catch (Exception $e) {
            Log::info("Send Message API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }


    public function getChat(Request $request)
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
            $getMessage = Message::where('chat_room_id', $request->chat_room_id)->get();
            if (!empty($getMessage)) {
                $getMessagesData = array();
                foreach ($getMessage as $getMessages) {
                    $messagesData = [];
                    $messagesData['id'] = $getMessages->id ? (string) $getMessages->id : '';
                    $messagesData['sender_id'] = $getMessages->sender_id ? (string) $getMessages->sender_id : '';
                    $messagesData['sender_name'] = $getMessages->user ? (string) $getMessages->user->name : '';
                    $messagesData['chat_room_id'] = $getMessages->chat_room_id ? (string) $getMessages->chat_room_id : '';
                    $messagesData['messages'] = $getMessages->messages ? (string) decrypt($getMessages->messages) : '';
                    $messagesData['attachment'] = $getMessages->attachment ?  asset('storage/' . $getMessages->attachment) : "";
                    $messagesData['date_time'] = $getMessages->created_at ? (string) $getMessages->created_at : '';
                    $messagesData['date'] = $getMessages->created_at ? (string) date("Y-m-d", strtotime($getMessages->created_at)) : '';
                    array_push($getMessagesData, $messagesData);
                }
                return $this->sendResponse($getMessagesData, 'Data Fetch Successfully');
            }
        } catch (Exception $e) {
            Log::info("Get Chat API Error: " . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
}
