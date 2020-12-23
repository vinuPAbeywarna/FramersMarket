<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_models', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('NIC')->unique();
            $table->string('PasswordHash');
            $table->string('Address');
            $table->string('Phone')->unique();
            $table->string('Email')->nullable();
            $table->string('Photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmer_models');
    }
}
