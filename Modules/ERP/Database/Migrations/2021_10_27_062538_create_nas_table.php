<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('na_code','255')->nullable();
            $table->string('na_name','255')->nullable();
            $table->string('mna_name','255')->nullable();
            $table->string('contact_no','11')->nullable();
            $table->string('short_description','255')->nullable();
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
        Schema::dropIfExists('nas');
    }
}
