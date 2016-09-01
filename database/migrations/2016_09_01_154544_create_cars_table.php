<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_model');
            $table->string('line');
            $table->integer('available_spots');
            $table->integer('car_brand_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('car_brand_id')->references('id')->on('car_brands');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('cars');
    }
}
