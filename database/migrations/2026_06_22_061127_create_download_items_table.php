<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadItemsTable extends Migration
{
    public function up()
    {
        Schema::create('download_items', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('catalogue');
            $table->string('icon_class')->default('bi bi-journal-richtext');
            $table->string('type')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_type')->default('PDF');
            $table->string('file_size')->nullable();
            $table->string('meta_icon')->nullable();
            $table->string('meta_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('badge_text')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('download_items');
    }
}