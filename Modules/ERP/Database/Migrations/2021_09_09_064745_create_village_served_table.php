<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageServedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_served', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('village_served_scheme_idFk','255')->nullable();
            $table->string('village_served_vcode','255')->nullable();
            $table->string('village_served_vname','255')->nullable();
            $table->string('village_served_population_nintyeigth','255')->nullable();
            $table->string('village_served_population_twoeight','255')->nullable();
            $table->string('village_served_no_of_houses','255')->nullable();
            $table->string('village_served_water_source','255')->nullable();
            $table->string('village_served_water_zone','255')->nullable();
            $table->string('village_served_barani_area','255')->nullable();
            $table->string('village_served_contamination','255')->nullable();
            $table->string('village_served_remarks','255')->nullable();
            $table->string('village_served_insert_term','255')->nullable();
            $table->string('village_served_updated_term','255')->nullable();
            $table->string('village_served_loc_type','255')->nullable();
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
        Schema::dropIfExists('village_served');
    }
}
