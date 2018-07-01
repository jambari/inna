<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArrivals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->char('lintang')->nullable();
            $table->char('bujur')->nullable();
            $table->char('mag')->nullable();
            $table->char('eta')->nullable();
            $table->char('ehw')->nullable();
            $table->char('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrivals');
    }
}
