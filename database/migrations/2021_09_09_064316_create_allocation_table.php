<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('alo_scheme_idFk')->nullable();
            $table->string('alo_block_code','255')->nullable();
            $table->string('alo_adp_year_code','255')->nullable();
            $table->string('alo_adp_no','255')->nullable();
            $table->string('alo_status','255')->nullable();
            $table->string('alo_date','255')->nullable();
            $table->bigInteger('alo_amount')->nullable();
            $table->bigInteger('alo_capital')->nullable();
            $table->bigInteger('alo_revenue')->nullable();
            $table->bigInteger('alo_foreign_aid')->nullable();
            $table->string('alo_new_ongoing_code','255')->nullable();
            $table->string('alo_prog_code','255')->nullable();
            $table->integer('alo_created_by')->nullable();
            $table->integer('alo_updated_by')->nullable();
            $table->integer('alo_province_idFk')->nullable();
            $table->string('alo_insert_term','255')->nullable();
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
        Schema::dropIfExists('allocation');
    }
}
