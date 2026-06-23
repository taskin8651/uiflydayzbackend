<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtectionTypesTable extends Migration
{
    public function up()
    {
        Schema::create('protection_types', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();

            $table->boolean('is_alt')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('protection_types');
    }
}