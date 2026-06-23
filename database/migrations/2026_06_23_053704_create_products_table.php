


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_size_category_id')->nullable();
            $table->unsignedBigInteger('protection_type_id')->nullable();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('badge_text')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('short_description')->nullable();

            $table->decimal('rating', 2, 1)->default(5.0);
            $table->string('rating_text')->nullable();

            $table->string('size_text')->nullable();
            $table->string('flow_text')->nullable();
            $table->string('pack_text')->nullable();

            $table->string('feature_one')->nullable();
            $table->string('feature_two')->nullable();
            $table->string('feature_three')->nullable();
            $table->string('feature_four')->nullable();

            $table->string('float_one_text')->nullable();
            $table->string('float_two_text')->nullable();

            $table->string('absorption_type')->default('normal'); // normal / heavy / very-heavy

            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            $table->foreign('product_size_category_id')
                ->references('id')
                ->on('product_size_categories')
                ->nullOnDelete();

            $table->foreign('protection_type_id')
                ->references('id')
                ->on('protection_types')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}