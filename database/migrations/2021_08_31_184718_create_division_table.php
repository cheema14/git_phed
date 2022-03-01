<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->bigInteger('zone_id')->nullable();
            $table->string('division_name',255);
            $table->string('division_description',255)->nullable();
            
            $table->timestamps();

//             DIV_CODE           VARCHAR2(20 BYTE)          NOT NULL,
//   ZONE_CODE          VARCHAR2(20 BYTE)          NOT NULL,
//   DEPARTMENT_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   SECTOR_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROGRAM_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROVINCE_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   DIV_NAME           VARCHAR2(100 BYTE),
//   DIV_S_NAME      VARCHAR2(50 BYTE),
//   DIV_DESCRIPTION        VARCHAR2(250 BYTE),
//   REP_ORDER_DIV          NUMBER,
//   CONSTRAINT DIVISION_PK
//  PRIMARY KEY
//  (DIV_CODE, ZONE_CODE, DEPARTMENT_CODE, SECTOR_CODE, PROGRAM_CODE, PROVINCE_CODE)

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('division');
    }
}
