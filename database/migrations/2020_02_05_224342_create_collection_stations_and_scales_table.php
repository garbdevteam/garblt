<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionStationsAndScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_stations_and_scales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->bigIncrements('id');
            $table->string('title');
            $table->string('location');
            $table->string('subscription')->nullable();
            $table->string('tariff')->nullable();


            $table->integer('order')->unique()->nullable();

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
        Schema::dropIfExists('collection_stations_and_scales');
    }
}
