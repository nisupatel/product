<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionAndCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('region_name', 20);
            $table->char('region_code', 3);
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->char('iso2', 2);
            $table->char('iso3', 3);
            $table->string('name', 95);
            $table->string('numcode', 6);
            $table->integer('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('regions');
        Schema::dropIfExists('countries');
    }
}
