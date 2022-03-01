<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pc_scheme_idFk')->nullable();
            $table->string('pc_level','255')->nullable();
            $table->string('pc_date','255')->nullable();
            $table->string('pc_doc_no','255')->nullable();
            $table->integer('pc_province_idFk')->nullable();
            $table->string('pc_status','255')->nullable();
            $table->string('pc_app_code','255')->nullable();
            $table->bigInteger('pc_amount')->nullable();
            $table->string('pc_auth','255')->nullable();
            $table->longText('pc_remarks')->nullable();
            $table->integer('pc_created_by')->nullable();
            $table->integer('pc_updated_by')->nullable();
            $table->string('pc_insert_term','255')->nullable();
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
        Schema::dropIfExists('pc');
    }
}
