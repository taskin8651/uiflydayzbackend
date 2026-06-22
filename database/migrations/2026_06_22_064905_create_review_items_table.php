<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewItemsTable extends Migration
{
    public function up()
    {
        Schema::create('review_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('buyer_label')->default('Verified Buyer');
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->text('message');
            $table->string('product_tag')->nullable();
            $table->string('review_time')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_items');
    }
}