<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgStructsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prog_structs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('structCode');
            $table->string('ProCert');
            $table->string('certDesc');
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
        Schema::dropIfExists('prog_structs');
    }
}
