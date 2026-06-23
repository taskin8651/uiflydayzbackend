<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $this->import('frontend/privacy-policy.blade.php', 'privacy_policy_sections', 'data-privacy-panel');
        $this->import('frontend/term-condition.blade.php', 'terms_condition_sections', 'data-terms-panel');
    }

    private function import(string $view, string $table, string $attribute): void
    {
        $source = file_get_contents(resource_path('views/' . $view));
        preg_match('/@if\(false\)(.*?)@endif/s', $source, $legacy);
        preg_match_all('/<article class="(?:pp|tc)-policy-content.*?<\/article>/s', $legacy[1] ?? '', $articles);

        foreach ($articles[0] ?? [] as $article) {
            if (preg_match('/' . preg_quote($attribute, '/') . '="([^"]+)"/', $article, $slug)) {
                DB::table($table)->where('slug', $slug[1])->update(['content' => $article, 'updated_at' => now()]);
            }
        }
    }

    public function down(): void
    {
        // Content import is intentionally retained on rollback.
    }
};
