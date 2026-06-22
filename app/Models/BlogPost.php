<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'category', 'author', 'read_time',
        'image_path', 'published_at', 'is_featured', 'status', 'sort_order',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function getImageUrlAttribute(): string
    {
        return $this->image_path ? asset($this->image_path) : asset('assets/images/products/product2.png');
    }

    public static function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'article';
        $slug = $base;
        $number = 2;

        while (static::query()->where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $number++;
        }

        return $slug;
    }
}
