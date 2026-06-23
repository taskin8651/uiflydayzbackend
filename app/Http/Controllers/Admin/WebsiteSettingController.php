<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::current();

        return view('admin.website-settings.index', compact('websiteSetting'));
    }

    public function update(Request $request)
    {
        $websiteSetting = WebsiteSetting::current();

        $request->validate([
            'website_name' => ['nullable', 'string', 'max:255'],
            'website_short_name' => ['nullable', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'footer_description' => ['nullable', 'string'],
            'copyright_text' => ['nullable', 'string', 'max:255'],
            'visitor_count' => ['nullable', 'integer', 'min:0'],

            'primary_phone' => ['nullable', 'string', 'max:50'],
            'secondary_phone' => ['nullable', 'string', 'max:50'],
            'whatsapp_number' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'support_email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'pincode' => ['nullable', 'string', 'max:20'],
            'google_map_link' => ['nullable', 'string'],
            'google_map_embed' => ['nullable', 'string'],

            'facebook_url' => ['nullable', 'string'],
            'instagram_url' => ['nullable', 'string'],
            'linkedin_url' => ['nullable', 'string'],
            'youtube_url' => ['nullable', 'string'],
            'twitter_url' => ['nullable', 'string'],
            'pinterest_url' => ['nullable', 'string'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'canonical_url' => ['nullable', 'string'],
            'robots_text' => ['nullable', 'string', 'max:100'],
            'google_analytics_code' => ['nullable', 'string'],
            'google_tag_manager_code' => ['nullable', 'string'],
            'facebook_pixel_code' => ['nullable', 'string'],
            'schema_json' => ['nullable', 'string'],

            'header_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
            'footer_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
            'favicon' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg,ico', 'max:2048'],
            'og_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $websiteSetting->update($request->only([
            'website_name',
            'website_short_name',
            'tagline',
            'footer_description',
            'copyright_text',
            'visitor_count',

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
        ]));

        foreach (['header_logo', 'footer_logo', 'favicon', 'og_image'] as $collection) {
            if ($request->hasFile($collection)) {
                $websiteSetting
                    ->addMediaFromRequest($collection)
                    ->toMediaCollection($collection);
            }
        }

        return redirect()
            ->route('admin.website-settings.index')
            ->with('success', 'Website settings updated successfully.');
    }
}
