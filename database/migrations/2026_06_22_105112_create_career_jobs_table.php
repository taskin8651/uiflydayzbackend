<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerJobsTable extends Migration
{
    public function up()
    {
        Schema::create('career_jobs', function (Blueprint $table) {
            $table->id();

            $table->string('category')->default('sales');
            $table->string('category_label')->nullable();

            $table->string('status_label')->default('Open');
            $table->string('status_type')->default('open'); // open / urgent / intern

            $table->string('title');
            $table->string('location')->nullable();
            $table->string('experience')->nullable();
            $table->string('job_type')->nullable();

            $table->text('description')->nullable();

            $table->string('requirement_one')->nullable();
            $table->string('requirement_two')->nullable();
            $table->string('requirement_three')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('career_jobs');
    }
}