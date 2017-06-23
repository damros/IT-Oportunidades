<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                  ->references('id')->on('companys')
                  ->onUpdate('cascade');             
            $table->string('title');
            $table->string('location')->nullable();
            $table->integer('job_type_id')->unsigned();
            $table->foreign('job_type_id')
                  ->references('id')->on('job_types')
                  ->onUpdate('cascade');            
            $table->string('tags')->nullable();
            $table->text('description');
            $table->string('salary')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('fill_date')->nullable();
            $table->integer('pricing_id')->nullable()->unsigned();
            $table->foreign('pricing_id')
                  ->references('id')->on('pricing')
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
        Schema::drop('job');
    }
}
