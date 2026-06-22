<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('certificate_items', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('quality');
            $table->string('category_label')->nullable();
            $table->string('status_label')->default('Listed');
            $table->string('status_icon')->default('bi bi-check-circle-fill');
            $table->string('status_type')->default('success'); // success / neutral
            $table->string('logo_icon_class')->default('bi bi-journal-check');
            $table->string('code')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('meta_icon')->nullable();
            $table->string('meta_text')->nullable();
            $table->string('file_type')->default('PDF Record');
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificate_items');
    }
}