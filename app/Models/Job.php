<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Job extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
        'banner',
        'enabled',
        'quality_score',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
