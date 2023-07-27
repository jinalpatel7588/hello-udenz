<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        "link",
        "user_id",
    ];

    public function latestMessages()
    {
        return $this->hasMany(Message::class, 'chat_room_id')->orderBy('id', 'desc');
    }

    public function chatRoomMembers(): HasMany
    {
        return $this->hasMany(ChatRoomMember::class, 'chat_room_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
