<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('category', 80)->default('period-care');
            $table->string('author')->default('FlyDayz Care Team');
            $table->string('read_time', 30)->default('4 min read');
            $table->string('image_path')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('blog_posts')->insert([
            [
                'title' => 'How to Choose the Right Sanitary Pad for Your Flow', 'slug' => 'how-to-choose-the-right-sanitary-pad-for-your-flow',
                'excerpt' => 'A simple guide to pad length, absorbency, day use and overnight protection.',
                'content' => "Choosing a sanitary pad begins with understanding what makes you feel protected and comfortable. Your flow can change from one day to the next, so it helps to keep more than one size in your period-care kit.\n\nFor daytime, choose a pad that lets you move comfortably while giving the coverage you need. On heavier days, look for stronger absorption and a longer length. For sleep, an extra-long pad and secure wings can offer more confidence through the night.\n\nChange your pad regularly, choose a clean and dry place to store your products, and listen to your own comfort. The right choice is the one that helps you go about your day with ease.",
                'category' => 'product-guide', 'author' => 'FlyDayz Care Team', 'read_time' => '5 min read', 'image_path' => 'assets/images/products/product2.png', 'published_at' => '2026-06-12 09:00:00', 'is_featured' => true, 'status' => true, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'title' => 'Period Hygiene Essentials for Busy Days', 'slug' => 'period-hygiene-essentials-for-busy-days',
                'excerpt' => 'Small hygiene habits that help support freshness, comfort and confidence through the day.',
                'content' => "Busy days are easier when your period-care essentials are packed before you leave home. Keep a few pads, tissues and a small disposal pouch in a clean pouch that fits easily in your bag.\n\nChange your pad regularly and wash your hands before and after changing. Choosing breathable clothing, staying hydrated and taking a quick comfort break can make a noticeable difference on long days.\n\nThere is no one perfect routine. Build a practical rhythm that works for your schedule and lets you feel prepared wherever the day takes you.",
                'category' => 'period-care', 'author' => 'Wellness Desk', 'read_time' => '4 min read', 'image_path' => 'assets/images/decor/pad-outline-1.png', 'published_at' => '2026-06-08 09:00:00', 'is_featured' => false, 'status' => true, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'title' => 'How to Store Sanitary Pads Safely', 'slug' => 'how-to-store-sanitary-pads-safely',
                'excerpt' => 'Keep pads dry, clean and ready to use with these simple storage recommendations.',
                'content' => "Sanitary pads are best kept in a clean, dry space away from moisture. A drawer, cabinet or zip pouch protects the packaging from dust and keeps products easy to find when you need them.\n\nAvoid leaving pads in very humid places, and keep opened packs covered or stored in a pouch. When carrying pads outside, a small case helps keep them clean and discreet.\n\nA little preparation means your period-care products stay fresh, organised and ready for everyday use.",
                'category' => 'hygiene', 'author' => 'FlyDayz Care Team', 'read_time' => '3 min read', 'image_path' => 'assets/images/decor/cotton-1.png', 'published_at' => '2026-06-02 09:00:00', 'is_featured' => false, 'status' => true, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
