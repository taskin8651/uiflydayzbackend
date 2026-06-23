<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProtectionType extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'badge_text',
        'title',
        'slug',
        'description',
        'point_one',
        'point_two',
        'point_three',
        'is_alt',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'is_alt' => 'boolean',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('protection_type_image')->singleFile();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}