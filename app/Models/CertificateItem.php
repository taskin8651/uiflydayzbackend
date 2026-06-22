<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CertificateItem extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'category',
        'category_label',
        'status_label',
        'status_icon',
        'status_type',
        'logo_icon_class',
        'code',
        'title',
        'description',
        'meta_icon',
        'meta_text',
        'file_type',
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
            ->addMediaCollection('certificate_file')
            ->singleFile();
    }
}