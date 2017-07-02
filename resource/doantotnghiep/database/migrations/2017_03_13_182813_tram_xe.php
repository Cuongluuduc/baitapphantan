<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TramXe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tramxe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // $table->string('email')->unique();
            $table->string('tuyen');
            $table->float('ing');
            $table->float('lat');
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
        Schema::drop('tramxe');
    }
}
