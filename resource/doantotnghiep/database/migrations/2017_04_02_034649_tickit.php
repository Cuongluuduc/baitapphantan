<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tickit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cost');
            $table->date('date');
            $table->integer('total_tickit');
            $table->integer('empty_tickit');
            $table->integer('router_id');
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
       Schema::drop('tickit');
    }
}
