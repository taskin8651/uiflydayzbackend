<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('distributor_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('business_name')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('partnership_category');
            $table->string('business_experience')->nullable();
            $table->string('current_network')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new'); // new / read
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distributor_enquiries');
    }
}