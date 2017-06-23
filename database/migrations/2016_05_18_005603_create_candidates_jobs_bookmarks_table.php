<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesJobsBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates_jobs_bookmarks', function (Blueprint $table) {
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
        Schema::drop('candidate_job_bookmark');
    }
}
