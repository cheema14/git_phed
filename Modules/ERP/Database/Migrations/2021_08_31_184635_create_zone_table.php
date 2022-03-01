<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->string('zone_name', 255)->nullable();
            
            $table->timestamps();

        //     ZONE_CODE          VARCHAR2(20 BYTE)          NOT NULL,
        //     DEPARTMENT_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     SECTOR_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     PROGRAM_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     PROVINCE_CODE      VARCHAR2(2 BYTE)           NOT NULL,
        //     ZONE_NAME          VARCHAR2(100 BYTE),
        //     REP_ORDER_ZONE     NUMBER,
        //     CONSTRAINT ZONE_PK
        //    PRIMARY KEY
        //    (ZONE_CODE, DEPARTMENT_CODE, SECTOR_CODE, PROGRAM_CODE, PROVINCE_CODE)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zone');
    }
}
