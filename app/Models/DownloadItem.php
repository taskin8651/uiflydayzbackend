<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DownloadItem extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'category',
        'icon_class',
        'type',
        'title',
        'description',
        'file_type',
        'file_size',
        'meta_icon',
        'meta_text',
        'button_text',
        'badge_text',
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
            ->addMediaCollection('download_file')
            ->singleFile();
    }
}