<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->bigInteger('zone_id');
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->bigInteger('tehsil_id');
            $table->string('village_name',255)->nullable();
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
        Schema::dropIfExists('village');
    }
}
