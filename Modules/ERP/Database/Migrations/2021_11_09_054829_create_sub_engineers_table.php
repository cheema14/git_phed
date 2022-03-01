<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_engineers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->string('designation', 255)->nullable();
            $table->integer('province_idFk')->nullable();
            $table->integer('zone_idFk')->nullable();
            $table->integer('division_idFk')->nullable();
            $table->integer('district_idFk')->nullable();
            $table->integer('tehsil_idFk')->nullable();
            $table->integer('ce_idFk')->nullable();
            $table->integer('se_idFk')->nullable();
            $table->integer('ee_idFk')->nullable();
            $table->integer('sdo_idFk')->nullable();
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
        Schema::dropIfExists('sub_engineers');
    }
}
