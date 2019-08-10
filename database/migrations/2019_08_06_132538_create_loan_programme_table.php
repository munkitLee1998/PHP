<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_programme', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id')->unsigned()->nullable();
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->integer('programme_id')->unsigned()->nullable();
            $table->foreign('programme_id')->references('id')->on('programmes');
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
        Schema::dropIfExists('loan_programme');
    }
}
