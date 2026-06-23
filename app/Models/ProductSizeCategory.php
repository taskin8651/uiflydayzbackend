<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSizeCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'size_label',
        'flow_label',
        'absorption_type',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}