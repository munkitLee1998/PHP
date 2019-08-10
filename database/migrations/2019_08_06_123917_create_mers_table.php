<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('examQualify');
            $table->string('merDesc');
            $table->integer('program_id')->unsigned()->nullable();
            $table->foreign('program_id')->references('id')->on('programmes')->onDelete('cascade');
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
        Schema::dropIfExists('mers');
    }
}
