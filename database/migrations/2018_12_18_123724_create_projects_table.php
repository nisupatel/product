<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('project_number')->nullable();
            $table->string('assessment_completed_by')->nullable();
            $table->integer('estimated_timeline_PCN_year')->nullable();
            $table->char('estimated_timeline_PCN_quarter')->nullable();
            $table->string('project_ttl')->nullable();
            $table->integer('tool_id')->unsigned()->nullable();
            $table->foreign('tool_id')->references('id')->on('tools')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('concept_note')->nullable();
            $table->text('description')->nullable();
            $table->json('funding_source')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
