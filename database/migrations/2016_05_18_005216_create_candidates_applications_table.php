<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')
                  ->references('id')->on('candidates')
                  ->onUpdate('cascade');             
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')
                  ->references('id')->on('jobs')
                  ->onUpdate('cascade');             
            $table->date('date');
            $table->integer('application_status_id')->unsigned()->nullable();
            $table->foreign('application_status_id')
                  ->references('id')->on('application_status')
                  ->onUpdate('cascade');             
            $table->integer('rating')->unsigned()->nullable();
            $table->string('message')->nullable();            
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
        Schema::drop('candidate_application');
    }
}
