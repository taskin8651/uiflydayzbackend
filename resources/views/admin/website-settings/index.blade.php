@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">
            Manage basic info, branding, contact details, social links and SEO from one place
        </p>
    </div>
</div>

@if(session('success'))
    <div class="form-info-box" style="margin-bottom:18px;">
        <p>
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </p>
    </div>
@endif

<form method="POST"
      action="{{ route('admin.website-settings.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- BASIC INFO --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-globe"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Website Info</p>
                    <p class="form-card-subtitle">Website name, tagline and footer text</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Website Name</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-building icon"></i>
                        <input type="text" name="website_name" value="{{ old('website_name', $websiteSetting->website_name) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Website Short Name</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-font icon"></i>
                        <input type="text" name="website_short_name" value="{{ old('website_short_name', $websiteSetting->website_short_name) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Tagline</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-quote-left icon"></i>
                        <input type="text" name="tagline" value="{{ old('tagline', $websiteSetting->tagline) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Footer Description</label>
                    <textarea name="footer_description"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('footer_description', $websiteSetting->footer_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Copyright Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-copyright icon"></i>
                        <input type="text" name="copyright_text" value="{{ old('copyright_text', $websiteSetting->copyright_text) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Current Visitor Total</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-eye icon"></i>
                        <input type="text" value="{{ number_format($websiteSetting->visitor_count) }}" class="field-input" readonly>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Add Visitors Manually</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-plus-circle icon"></i>
                        <input type="number" min="0" name="visitor_increment" value="{{ old('visitor_increment', 0) }}" class="field-input" placeholder="Example: 100">
                    </div>
                    <p class="field-hint">This number current visitor total mein add hoga. Existing count reset nahi hoga.</p>
                </div>

            </div>
        </div>

        {{-- LOGO BRANDING --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Logo & Branding</p>
                    <p class="form-card-subtitle">Header logo, footer logo, favicon and OG image</p>
                </div>
            </div>

            <div class="form-card-body">

                @php
                    $mediaFields = [
                        'header_logo' => 'Header Logo',
                        'footer_logo' => 'Footer Logo',
                        'favicon' => 'Favicon',
                        'og_image' => 'OG / Social Share Image',
                    ];
                @endphp

                @foreach($mediaFields as $field => $label)
                    <div class="field-group">
                        <label class="field-label">{{ $label }}</label>

                        @if($websiteSetting->getFirstMediaUrl($field))
                            <div style="border:1px solid #E2E8F0;border-radius:16px;background:#F8FAFC;padding:14px;text-align:center;margin-bottom:10px;">
                                <img src="{{ $websiteSetting->getFirstMediaUrl($field) }}"
                                     alt="{{ $label }}"
                                     style="max-width:100%;height:90px;object-fit:contain;">
                            </div>
                        @endif

                        <div class="input-icon-wrap">
                            <i class="fas fa-upload icon"></i>
                            <input type="file" name="{{ $field }}" class="field-input">
                        </div>
                    </div>
                @endforeach

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        New image upload karne par old image replace ho jayegi.
                    </p>
                </div>

            </div>
        </div>

        {{-- CONTACT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Contact Details</p>
                    <p class="form-card-subtitle">Phone, email, WhatsApp and address</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Primary Phone</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>
                        <input type="text" name="primary_phone" value="{{ old('primary_phone', $websiteSetting->primary_phone) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Secondary Phone</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>
                        <input type="text" name="secondary_phone" value="{{ old('secondary_phone', $websiteSetting->secondary_phone) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">WhatsApp Number</label>
                    <div class="input-icon-wrap">
                        <i class="fab fa-whatsapp icon"></i>
                        <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $websiteSetting->whatsapp_number) }}" class="field-input">
                    </div>
                    <p class="field-hint">Example: 917209770033</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Email</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="email" value="{{ old('email', $websiteSetting->email) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Support Email</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-headset icon"></i>
                        <input type="email" name="support_email" value="{{ old('support_email', $websiteSetting->support_email) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Address</label>
                    <textarea name="address"
                              rows="4"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('address', $websiteSetting->address) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">City</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-city icon"></i>
                        <input type="text" name="city" value="{{ old('city', $websiteSetting->city) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">State</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-map icon"></i>
                        <input type="text" name="state" value="{{ old('state', $websiteSetting->state) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Pincode</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-map-pin icon"></i>
                        <input type="text" name="pincode" value="{{ old('pincode', $websiteSetting->pincode) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Google Map Link</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-location-arrow icon"></i>
                        <input type="text" name="google_map_link" value="{{ old('google_map_link', $websiteSetting->google_map_link) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Google Map Embed Code</label>
                    <textarea name="google_map_embed"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('google_map_embed', $websiteSetting->google_map_embed) }}</textarea>
                </div>

            </div>
        </div>

        {{-- SOCIAL LINKS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-share-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Social Media Links</p>
                    <p class="form-card-subtitle">Manage social profile URLs</p>
                </div>
            </div>

            <div class="form-card-body">

                @php
                    $socialFields = [
                        'facebook_url' => ['Facebook URL', 'fab fa-facebook-f'],
                        'instagram_url' => ['Instagram URL', 'fab fa-instagram'],
                        'linkedin_url' => ['LinkedIn URL', 'fab fa-linkedin-in'],
                        'youtube_url' => ['YouTube URL', 'fab fa-youtube'],
                        'twitter_url' => ['Twitter / X URL', 'fab fa-x-twitter'],
                        'pinterest_url' => ['Pinterest URL', 'fab fa-pinterest'],
                    ];
                @endphp

                @foreach($socialFields as $field => $data)
                    <div class="field-group">
                        <label class="field-label">{{ $data[0] }}</label>

                        <div class="input-icon-wrap">
                            <i class="{{ $data[1] }} icon"></i>
                            <input type="text"
                                   name="{{ $field }}"
                                   value="{{ old($field, $websiteSetting->{$field}) }}"
                                   class="field-input">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- SEO --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-search"></i>
                </div>

                <div>
                    <p class="form-card-title">SEO Settings</p>
                    <p class="form-card-subtitle">Meta title, description, keywords and scripts</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Meta Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="meta_title" value="{{ old('meta_title', $websiteSetting->meta_title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Meta Description</label>
                    <textarea name="meta_description"
                              rows="4"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('meta_description', $websiteSetting->meta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Meta Keywords</label>
                    <textarea name="meta_keywords"
                              rows="3"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('meta_keywords', $websiteSetting->meta_keywords) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Canonical URL</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="canonical_url" value="{{ old('canonical_url', $websiteSetting->canonical_url) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Robots Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-robot icon"></i>
                        <input type="text" name="robots_text" value="{{ old('robots_text', $websiteSetting->robots_text) }}" placeholder="index, follow" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Google Analytics Code</label>
                    <textarea name="google_analytics_code"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('google_analytics_code', $websiteSetting->google_analytics_code) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Google Tag Manager Code</label>
                    <textarea name="google_tag_manager_code"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('google_tag_manager_code', $websiteSetting->google_tag_manager_code) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Facebook Pixel Code</label>
                    <textarea name="facebook_pixel_code"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('facebook_pixel_code', $websiteSetting->facebook_pixel_code) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Schema JSON</label>
                    <textarea name="schema_json"
                              rows="6"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('schema_json', $websiteSetting->schema_json) }}</textarea>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        @can('website_setting_edit')
            <button type="submit" class="btn-primary">
                <i class="fas fa-check"></i>
                Save Settings
            </button>
        @endcan

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection     
