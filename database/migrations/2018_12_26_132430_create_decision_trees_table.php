<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_trees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('component_type',32)->nullable();
            $table->string('exposure_types',500)->nullable();
            $table->integer('exposure_rating')->unsigned()->nullable();
            $table->text('exposure_notes')->nullable();
            $table->string('impact_sectors',500)->nullable();
            $table->integer('impact_rating')->unsigned()->nullable();
            $table->text('impact_notes')->nullable();
            $table->string('softcom_types',500)->nullable();
            $table->string('softcom_rating',32)->nullable();
            $table->string('softcom_vulnerability',32)->nullable();
            $table->string('softcom_vul_alleviate',32)->nullable();
            $table->text('softcom_notes')->nullable();
            $table->string('context_rating',32)->nullable();
            $table->text('context_notes')->nullable();
            $table->string('outcome_rating',32)->nullable();
            $table->text('outcome_notes')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('decision_trees');
    }
}
