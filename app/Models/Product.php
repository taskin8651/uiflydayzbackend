<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'product_size_category_id',
        'protection_type_id',
        'name',
        'slug',
        'badge_text',
        'subtitle',
        'short_description',
        'rating',
        'rating_text',
        'size_text',
        'flow_text',
        'pack_text',
        'feature_one',
        'feature_two',
        'feature_three',
        'feature_four',
        'float_one_text',
        'float_two_text',
        'absorption_type',
        'is_featured',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        // Single main image
        $this->addMediaCollection('product_main_image')->singleFile();

        // Many gallery images
        $this->addMediaCollection('product_gallery');
    }

    public function sizeCategory()
    {
        return $this->belongsTo(ProductSizeCategory::class, 'product_size_category_id');
    }

    public function protectionType()
    {
        return $this->belongsTo(ProtectionType::class);
    }
}