<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->bigInteger('zone_id');
            $table->bigInteger('division_id');
            $table->string('district_name', 255)->nullable();
            $table->double('population_nighty_eight')->nullable();
            $table->double('population_zero_eight')->nullable();

            
            $table->timestamps();

//   DIV_CODE           VARCHAR2(20 BYTE)          NOT NULL,
//   ZONE_CODE          VARCHAR2(20 BYTE)          NOT NULL,
//   DEPARTMENT_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   SECTOR_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROGRAM_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROVINCE_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   DIST_NAME          VARCHAR2(100 BYTE),
//   REP_ORDER_DIST     NUMBER,
//   CONSTRAINT DISTRICT_PK
//  PRIMARY KEY
//  (DIST_CODE, DIV_CODE, ZONE_CODE, DEPARTMENT_CODE, SECTOR_CODE, PROGRAM_CODE, PROVINCE_CODE)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district');
    }
}
