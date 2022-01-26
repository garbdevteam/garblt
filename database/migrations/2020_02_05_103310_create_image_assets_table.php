<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_assets', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_general_ci';

                $table->bigIncrements('id');

                $table->string('title');
                $table->string('image')->nullable();
                $table->boolean('in_list')->default(FALSE);

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
        Schema::dropIfExists('image_assets');
    }
}
