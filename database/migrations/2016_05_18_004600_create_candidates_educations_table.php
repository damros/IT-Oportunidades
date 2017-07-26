<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')
                  ->references('id')->on('candidates')
                  ->onUpdate('cascade');            
            $table->string('school_name');
            $table->string('qualifications')->nullable();
            $table->string('date_from');
            $table->string('date_to')->nullable();
            $table->string('notes')->nullable();                        
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
        Schema::drop('candidate_education');
    }
}
