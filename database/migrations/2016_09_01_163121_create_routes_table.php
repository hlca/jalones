<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->integer('puller_id')->unsigned();
            $table->text('route');
            $table->time('route_start');
            $table->string('name');
            $table->string('description');
            $table->tinyinteger('spaces');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('puller_id')->references('id')->on('pullers');
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
        Schema::drop('routes');
    }
}
