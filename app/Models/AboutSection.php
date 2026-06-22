<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutSection extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'short_description',
        'description',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('about_section_image')
            ->singleFile();
    }
}