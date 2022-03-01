<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locality', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->bigInteger('program_id');
            $table->bigInteger('sector_id');
            $table->bigInteger('department_id');
            $table->bigInteger('zone_id');
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->bigInteger('tehsil_id');
            $table->bigInteger('union_council_id');
            $table->timestamps();
        //     LOCALITY_CODE           VARCHAR2(20 BYTE)          NOT NULL,
        //     UC_CODE           VARCHAR2(20 BYTE)          NOT NULL,
        //     TEH_CODE           VARCHAR2(20 BYTE)          NOT NULL,
        //     DIST_CODE          VARCHAR2(20 BYTE)          NOT NULL,
        //     DIV_CODE           VARCHAR2(20 BYTE)          NOT NULL,
        //     ZONE_CODE          VARCHAR2(20 BYTE)          NOT NULL,
        //     DEPARTMENT_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     SECTOR_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     PROGRAM_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     PROVINCE_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     LOC_NAME           VARCHAR2(100 BYTE),
        //     LOC_AREA           VARCHAR2(100 BYTE),
        //     REP_ORDER_LOC      NUMBER,
        //     CONSTRAINT TEHSIL_PK
        //    PRIMARY KEY
        //    (LOCALITY_CODE, UC_CODE, TEH_CODE, DIST_CODE, DIV_CODE, ZONE_CODE, DEPARTMENT_CODE, SECTOR_CODE, PROGRAM_CODE, PROVINCE_CODE)

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locality');
    }
}
