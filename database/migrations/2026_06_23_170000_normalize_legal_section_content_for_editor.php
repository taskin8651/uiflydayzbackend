<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        foreach (['privacy_policy_sections', 'terms_condition_sections'] as $table) {
            DB::table($table)->orderBy('id')->get()->each(function ($section) use ($table) {
                $content = preg_replace('/^\s*<article[^>]*>/s', '', $section->content);
                $content = preg_replace('/<\/article>\s*$/s', '', $content);
                DB::table($table)->where('id', $section->id)->update(['content' => trim($content), 'updated_at' => now()]);
            });
        }
    }
    public function down(): void {}
};
