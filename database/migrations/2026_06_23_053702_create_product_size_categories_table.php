<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizeCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('product_size_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // L / XL / XXL
            $table->string('slug')->unique();
            $table->string('size_label')->nullable(); // L-240mm
            $table->string('flow_label')->nullable(); // Normal / Heavy / Very Heavy
            $table->string('absorption_type')->default('normal'); // normal / heavy / very-heavy
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_size_categories');
    }
}