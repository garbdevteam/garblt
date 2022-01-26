<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsRoadsProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions_roads_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->bigIncrements('id');
            $table->bigInteger('region_id')->unsigned();
            $table->string('name');
            $table->string('location');
            $table->string('length');

            $table->string('image')->nullable();

            $table->integer('order')->unique()->nullable();

            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions_roads_projects');
    }
}
