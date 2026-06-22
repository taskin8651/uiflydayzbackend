<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerJob extends Model
{
    protected $fillable = [
        'category',
        'category_label',
        'status_label',
        'status_type',
        'title',
        'location',
        'experience',
        'job_type',
        'description',
        'requirement_one',
        'requirement_two',
        'requirement_three',
        'is_featured',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];
}