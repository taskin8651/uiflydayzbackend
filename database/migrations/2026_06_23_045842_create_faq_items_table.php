<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqItemsTable extends Migration
{
    public function up()
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();

            $table->string('group_key')->default('general');
            $table->string('group_title')->default('General');
            $table->string('group_icon')->default('bi bi-question-circle');

            $table->string('question_icon')->default('bi bi-question-circle');
            $table->string('question');
            $table->longText('answer');

            $table->boolean('is_open')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_items');
    }
}