<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicySection extends Model
{
    protected $fillable = ['title', 'slug', 'subtitle', 'icon_class', 'content', 'status', 'sort_order'];
    protected $casts = ['status' => 'boolean'];
}
