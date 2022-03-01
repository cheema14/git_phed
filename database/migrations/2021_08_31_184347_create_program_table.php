<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id')->nullable();
            $table->string('program_name', 255)->nullable();
            $table->string('program_s_name', 255)->nullable();
            $table->string('program_desc', 255)->nullable();
            $table->timestamps();

            // $table->foreign('province_id')
            // ->references('id')
            // ->on('province')
            // ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
}
