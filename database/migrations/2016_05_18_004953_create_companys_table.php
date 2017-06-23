<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('identification');
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('tagline')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('video')->nullable();
            $table->string('twitter')->nullable();
            $table->string('description')->nullable();
            $table->integer('user_id')->unsigned();  
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onUpdate('cascade');            
            $table->date('actived')->nullable();          
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
        Schema::drop('company');
    }
}
