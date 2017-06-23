<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')
                  ->references('id')->on('candidates')
                  ->onUpdate('cascade');            
            $table->string('name');
            $table->string('keyword');
            $table->integer('alert_email_frequency_id')->unsigned();
            $table->foreign('alert_email_frequency_id')
                  ->references('id')->on('alert_email_frequency')
                  ->onUpdate('cascade');            
            $table->integer('job_type_id')->unsigned();
            $table->foreign('job_type_id')
                  ->references('id')->on('job_types')
                  ->onUpdate('cascade');            
            $table->date('date');      
            $table->boolean('enabled');                   
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
        Schema::drop('candidate_alert');
    }
}
