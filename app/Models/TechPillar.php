<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TechPillar extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'number',
        'title',
        'description',
        'icon_alt',
        'is_featured',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('tech_pillar_icon')
            ->singleFile();
    }
}