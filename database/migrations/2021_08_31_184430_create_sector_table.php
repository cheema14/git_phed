<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->bigInteger('program_id');
            $table->timestamps();

//             SECTOR_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROGRAM_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROVINCE_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   SECTOR_NAME      VARCHAR2(30 BYTE),
//   SECTOR_S_NAME      VARCHAR2(50 BYTE),
//   SECTOR_DESC      VARCHAR2(50 BYTE),
//   CONSTRAINT SECTOR_PK
//  PRIMARY KEY
//  (SECTOR_CODE, PROGRAM_CODE, PROVINCE_CODE)

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector');
    }
}
