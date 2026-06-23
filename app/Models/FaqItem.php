<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    protected $fillable = [
        'group_key',
        'group_title',
        'group_icon',
        'question_icon',
        'question',
        'answer',
        'is_open',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'is_open' => 'boolean',
        'status' => 'boolean',
    ];
}