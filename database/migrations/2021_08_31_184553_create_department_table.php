<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('province_id');
            $table->bigInteger('program_id');
            $table->bigInteger('sector_id');
            $table->timestamps();

//             DEPARTMENT_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   SECTOR_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROGRAM_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   PROVINCE_CODE      VARCHAR2(2 BYTE)           NOT NULL,
//   DEPARTMENT_NAME      VARCHAR2(30 BYTE),
//   DEPARTMENT_S_NAME      VARCHAR2(30 BYTE),
//   DEPARTMENT_DESC      VARCHAR2(50 BYTE),
//   DEPARTMENT_IMAGE     BLOB,
//   CONSTRAINT DEPARTMENT_PK
//  PRIMARY KEY
//  (DEPARTMENT_CODE, SECTOR_CODE, PROGRAM_CODE, PROVINCE_CODE)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
}
