<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pps', function (Blueprint $table) {
            $table->id();
            $table->string('pp_code','255')->nullable();
            $table->string('pp_name','255')->nullable();
            $table->string('mpa_name','255')->nullable();
            $table->string('contact_no','11')->nullable();
            $table->bigInteger('zone_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('na_id')->nullable();
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
        Schema::dropIfExists('pps');
    }
}
