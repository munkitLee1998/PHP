<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_faculty', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->integer('faculty_id')->unsigned()->nullable();
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
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
        Schema::dropIfExists('branch_faculty');
    }
}
