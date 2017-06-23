<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysCandidatesBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys_candidates_bookmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                  ->references('id')->on('companys')
                  ->onUpdate('cascade');            
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')
                  ->references('id')->on('candidates')
                  ->onUpdate('cascade');            
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
        Schema::drop('company_candidate_bookmark');
    }
}
