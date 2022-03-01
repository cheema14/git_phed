<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExeEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exe_engineers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->string('designation', 255)->nullable();
            $table->integer('province_idFk')->nullable();
            $table->integer('zone_idFk')->nullable();
            $table->integer('division_idFk')->nullable();
            $table->integer('district_idFk')->nullable();
            $table->integer('chief_engineer_idFk')->nullable();
            $table->integer('supr_engineer_idFk')->nullable();
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
        Schema::dropIfExists('exe_engineers');
    }
}
