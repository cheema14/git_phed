<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionCouncilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('union_council', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->bigInteger('program_id')->nullable();
            $table->bigInteger('sector_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('zone_id');
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->bigInteger('tehsil_id');
            $table->string('uc_name',255)->nullable();
            $table->bigInteger('uc_no')->nullable();
            $table->double('population_nighty_eight')->nullable();
            $table->double('population_zero_eight')->nullable();
            $table->timestamps();

        //     UC_CODE           VARCHAR2(20 BYTE)          NOT NULL,
        //     TEH_CODE           VARCHAR2(20 BYTE)          NOT NULL,
        //     DIST_CODE          VARCHAR2(20 BYTE)          NOT NULL,
        //     DIV_CODE           VARCHAR2(20 BYTE)          NOT NULL,
        //     ZONE_CODE          VARCHAR2(20 BYTE)          NOT NULL,
        //     DEPARTMENT_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     SECTOR_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     PROGRAM_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     PROVINCE_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     UC_NAME           VARCHAR2(100 BYTE),
        //     UC_AREA           VARCHAR2(100 BYTE),
        //     REP_ORDER_UC      NUMBER,
        //     CONSTRAINT TEHSIL_PK
        //    PRIMARY KEY
        //    (UC_CODE, TEH_CODE, DIST_CODE, DIV_CODE, ZONE_CODE, DEPARTMENT_CODE, SECTOR_CODE, PROGRAM_CODE, PROVINCE_CODE)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('union_council');
    }
}
