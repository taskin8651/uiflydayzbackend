<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistributorEnquiry extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'business_name',
        'city',
        'state',
        'partnership_category',
        'business_experience',
        'current_network',
        'message',
        'status',
    ];
}