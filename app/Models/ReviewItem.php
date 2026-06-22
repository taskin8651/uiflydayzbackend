<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewItem extends Model
{
    protected $fillable = [
        'name',
        'buyer_label',
        'rating',
        'message',
        'product_tag',
        'review_time',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'status' => 'boolean',
    ];
}