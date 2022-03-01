<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cbo_scheme_idFk','255')->nullable();
            $table->string('cbo_sr_no','255')->nullable();
            $table->string('cbo_name','255')->nullable();
            $table->string('cbo_designation','255')->nullable();
            $table->string('cbo_contact_no','255')->nullable();
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
        Schema::dropIfExists('cbo');
    }
}
