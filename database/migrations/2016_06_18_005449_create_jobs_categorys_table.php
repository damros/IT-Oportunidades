<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')
                  ->references('id')->on('jobs')
                  ->onUpdate('cascade');             
            $table->integer('category_id')->unsigned(); 
            $table->foreign('category_id')
                  ->references('id')->on('categorys')
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
        Schema::drop('jobs_categorys');
    }
}
