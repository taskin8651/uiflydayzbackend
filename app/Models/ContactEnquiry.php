<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'enquiry_type',
        'city',
        'message',
        'status',
    ];
}