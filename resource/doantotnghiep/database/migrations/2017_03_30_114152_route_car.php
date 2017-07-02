<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RouteCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('time');
            $table->integer('total_chair');
            $table->integer('empty_chair');
            $table->integer('router_id');
            $table->integer('driver_id');
            $table->rememberToken();
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
        Schema::drop('route_car');
    }
}
