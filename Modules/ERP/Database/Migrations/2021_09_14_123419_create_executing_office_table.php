<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutingOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executing_office', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('officer_name',255)->nullable();
            $table->bigInteger('designation_id');
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('zone_id')->nullable();
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
        Schema::dropIfExists('executing_office');
    }
}
