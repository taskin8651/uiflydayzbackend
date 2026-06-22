<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();

            // Basic Website Info
            $table->string('website_name')->nullable();
            $table->string('website_short_name')->nullable();
            $table->string('tagline')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('copyright_text')->nullable();

            // Contact Details
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('support_email')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->text('google_map_link')->nullable();
            $table->longText('google_map_embed')->nullable();

            // Social Media Links
            $table->text('facebook_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('youtube_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('pinterest_url')->nullable();

            // SEO Settings
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('canonical_url')->nullable();
            $table->string('robots_text')->nullable();
            $table->longText('google_analytics_code')->nullable();
            $table->longText('google_tag_manager_code')->nullable();
            $table->longText('facebook_pixel_code')->nullable();
            $table->longText('schema_json')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
}