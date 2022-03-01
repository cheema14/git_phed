<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTsDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ts_dtls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('scheme_idFk')->nullable();
            $table->integer('ts_idFk')->nullable(); // mp_adp_no in monthly_progress_modal should be inserted here to make it unit and displayed as well
            $table->integer('main_head')->nullable();
            $table->integer('sub_head')->nullable();
            $table->integer('detail_head')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit')->nullable();
            $table->integer('cost')->nullable();
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
        Schema::dropIfExists('ts_dtls');
    }
}
