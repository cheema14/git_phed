<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp_dtls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('scheme_idFk')->nullable();
            $table->integer('mp_idFk')->nullable();
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
        Schema::dropIfExists('mp_dtls');
    }
}
