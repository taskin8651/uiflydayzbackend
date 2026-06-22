<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'website_name',
        'website_short_name',
        'tagline',
        'footer_description',
        'copyright_text',

        'primary_phone',
        'secondary_phone',
        'whatsapp_number',
        'email',
        'support_email',
        'address',
        'city',
        'state',
        'pincode',
        'google_map_link',
        'google_map_embed',

        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
        'twitter_url',
        'pinterest_url',

        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots_text',
        'google_analytics_code',
        'google_tag_manager_code',
        'facebook_pixel_code',
        'schema_json',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('header_logo')->singleFile();
        $this->addMediaCollection('footer_logo')->singleFile();
        $this->addMediaCollection('favicon')->singleFile();
        $this->addMediaCollection('og_image')->singleFile();
    }

    public function getHeaderLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('header_logo') ?: asset('assets/images/hero/logo.png');
    }

    public function getFooterLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('footer_logo') ?: $this->header_logo_url;
    }

    public function getFaviconUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('favicon') ?: asset('favicon.ico');
    }

    public function getOgImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('og_image') ?: $this->header_logo_url;
    }

    public function getPhoneUrlAttribute(): string
    {
        return 'tel:' . preg_replace('/[^0-9+]/', '', (string) $this->primary_phone);
    }

    public function whatsappUrl(string $message = ''): string
    {
        $number = preg_replace('/\D+/', '', (string) $this->whatsapp_number);
        return 'https://wa.me/' . $number . ($message ? '?text=' . urlencode($message) : '');
    }

    public static function current()
    {
        $setting = self::query()->first();

        if (!$setting) {
            $setting = self::create([
                'website_name' => 'FlyDayz',
                'website_short_name' => 'FlyDayz',
                'tagline' => 'Premium Feminine Hygiene Care',
                'footer_description' => 'FlyDayz is a premium feminine hygiene brand focused on comfort, softness and reliable protection.',
                'copyright_text' => '© 2026 FlyDayz. All Rights Reserved.',
                'primary_phone' => '+91 72097 70033',
                'whatsapp_number' => '917209770033',
                'email' => 'info@flydayz.com',
                'meta_title' => 'FlyDayz - Premium Feminine Hygiene Care',
                'meta_description' => 'FlyDayz offers premium sanitary pads designed for comfort, absorption and reliable protection.',
                'robots_text' => 'index, follow',
            ]);
        }

        return $setting;
    }
}
