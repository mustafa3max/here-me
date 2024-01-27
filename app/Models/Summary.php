<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'poster',
        'title',
        'description',
        'summary',
        'sections',
        'enabled',
        'quality_score',
    ];

    protected $casts = [
        'sections' => 'array',
        'enabled' => 'boolean',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
