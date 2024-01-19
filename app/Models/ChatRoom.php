<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ChatRoom extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id_me',
        'user_id_he',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    function userMe(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id_me');
    }

    function userHe(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id_he');
    }

}
