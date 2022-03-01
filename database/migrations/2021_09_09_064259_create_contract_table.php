<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cnt_scheme_idFk')->nullable();
            $table->string('cnt_code','255')->nullable();
            $table->string('cnt_name','255')->nullable();
            $table->string('cnt_date','255')->nullable();
            $table->integer('cnt_accept_no')->nullable();
            $table->string('cnt_accept_date','255')->nullable();
            $table->bigInteger('cnt_amount')->nullable();
            $table->string('cnt_commence_date','255')->nullable();
            $table->string('cnt_compl_code','255')->nullable();
            $table->string('cnt_compl_date','255')->nullable();
            $table->string('cnt_status','255')->nullable();
            $table->longText('cnt_remarks')->nullable();
            $table->integer('cnt_created_by')->nullable();
            $table->integer('cnt_updated_by')->nullable();
            $table->integer('cnt_province_idFk')->nullable();
            $table->string('act_compl_date','255')->nullable();
            $table->string('cnt_insert_term','255')->nullable();
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
        Schema::dropIfExists('contract');
    }
}
