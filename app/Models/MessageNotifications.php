<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageNotifications extends Model
{
    use HasFactory;

    public function ChatRoomData()
    {
        return $this->hasOne(ChatRoom::class, 'chat_room_id');
    }
}
