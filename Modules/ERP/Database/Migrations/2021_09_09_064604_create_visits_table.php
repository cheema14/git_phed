<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('visit_scheme_idFk')->nullable();
            $table->string('visit_date','255')->nullable();
            $table->string('visit_name','255')->nullable();
            $table->string('visit_designation','255')->nullable();
            $table->string('visit_inspection_code','255')->nullable();
            $table->integer('visit_province_idFk')->nullable();
            $table->string('visit_lat','255')->nullable();
            $table->string('visit_long','255')->nullable();
            $table->longText('visit_image_path')->nullable();
            $table->string('visit_status','255')->nullable();
            $table->string('visit_inspection_title','255')->nullable();
            $table->integer('visit_vsf_id')->nullable();
            $table->integer('visit_zone_idFk')->nullable();
            $table->integer('visit_division_idFk')->nullable();
            $table->integer('visit_district_idFk')->nullable();
            $table->string('visit_sch_visit_loc','255')->nullable();
            $table->string('visit_insert_term','255')->nullable();
            $table->string('visit_updated_term','255')->nullable();
            $table->string('visit_imei_no','255')->nullable();
            $table->string('visit_result','255')->nullable();
            $table->string('visit_vil_ident','255')->nullable();
            $table->string('visit_vis_off','255')->nullable();
            $table->string('visit_hp_sr_no','255')->nullable();
            $table->longText('visit_remarks_se')->nullable();
            $table->longText('visit_remarks_ce')->nullable();
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
        Schema::dropIfExists('visits');
    }
}
