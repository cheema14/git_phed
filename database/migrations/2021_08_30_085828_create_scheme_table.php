<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheme', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scheme_number', 50)->nullable();
            $table->string('scheme_name', 255)->nullable();
            $table->bigInteger('province_id')->nullable();
            $table->integer('zone_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('tehsil_id')->nullable();
            $table->integer('program_id')->nullable();
            $table->integer('uc_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('tech_id')->nullable();
            $table->integer('new_rehab_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('source_id')->nullable();
            $table->integer('quality_id')->nullable();
            $table->integer('nature_id')->nullable();
            $table->integer('population_served')->nullable();
            $table->integer('wc_gpcd')->nullable();
            $table->string('app_code',20)->nullable();
            $table->date('id_date')->nullable();
            $table->date('visited_on')->nullable();
            $table->date('short_listed_on')->nullable();
            $table->date('share_deposited')->nullable();
            $table->date('adv_oandm_cost')->nullable();
            $table->date('nac_date')->nullable();
            $table->date('ers_date')->nullable();
            $table->date('digital_survey')->nullable();
            $table->date('testing_date')->nullable();
            $table->date('handing_over_date')->nullable();
            $table->integer('compl_id')->nullable();
            $table->integer('func_id')->nullable();
            $table->integer('oandm_id')->nullable();
            $table->bigInteger('recommended_by_id')->nullable();
            $table->bigInteger('identified_by_id')->nullable();
            $table->float('rain_fall',7,2)->nullable();
            $table->integer('exe_id')->nullable();
            $table->integer('spons_id')->nullable();
            $table->integer('dr_sr_no')->nullable();
            $table->char('location_code',11)->nullable();
            $table->char('exe_off_code',10)->nullable();
            $table->char('location',8)->nullable();
            $table->float('proposed_cost',14,3)->nullable();
            $table->longText('remarks')->nullable();

            $table->integer('pp_id')->nullable();
            $table->integer('na_id')->nullable();
            $table->integer('village_id')->nullable();
            $table->string('village_locale',255)->nullable();
            $table->string('sch_group',50)->nullable();
            $table->integer('handing_id')->nullable();
            $table->integer('funding_id')->nullable();
            $table->integer('adp_yr_id')->nullable();
            $table->integer('block_id')->nullable();
            $table->string('block_desc',255)->nullable();
            $table->char('dropped_flag',2)->default('1');
            $table->integer('union_id')->nullable();
            $table->integer('chief_engineer_id')->nullable();
            $table->integer('supr_engineer_id')->nullable();
            $table->integer('executing_eengineer_id')->nullable();
            $table->integer('sdo_id')->nullable();
            $table->integer('sub_engineer_id')->nullable();
            $table->integer('tma_id')->nullable();
            $table->integer('sect_no')->nullable();
            $table->string('completion_year')->nullable();
            $table->float('completion_cost',13,3)->nullable();
            $table->integer('block_no')->nullable();
            $table->integer('ref_scheme_number')->nullable();
            $table->string('disposal_mode',255)->nullable();
            $table->string('disposal_type',255)->nullable();
            $table->string('ultimate_disposal',255)->nullable();
            $table->string('sch_lat',255)->nullable();
            $table->string('sch_long',255)->nullable();
            $table->string('last_activity_desc',255)->nullable();
            $table->integer('completion_per')->nullable();
            $table->date('completion_date')->nullable();
            $table->date('app_date')->nullable();
            $table->integer('rehab_cost')->nullable();
            $table->string('cbo_chairman',100)->nullable();
            $table->text('cbo_address')->nullable();
            $table->string('cbo_ph_no',15)->nullable();
            $table->string('chairman_cell',15)->nullable();
            $table->integer('cbo_member_total')->nullable();
            $table->integer('cbo_male')->nullable();
            $table->integer('cbo_female')->nullable();
            $table->integer('hh_connections')->nullable();
            $table->string('elec_bill_ref',20)->nullable();
            $table->integer('forum_id')->nullable();
            $table->string('dd_code',100)->nullable();
            $table->string('proj_code',100)->nullable();
            $table->string('object_code',100)->nullable();
            $table->integer('cdo_id')->nullable();
            $table->integer('cbm_id')->nullable();
            $table->string('immam_masjid',100)->nullable();
            $table->string('immam_masjid_cell',15)->nullable();
            $table->string('lamberdar',100)->nullable();
            $table->string('lamberdar_cell',15)->nullable();
            $table->string('dys_func_year',4)->nullable();


            // Added missing fields after meeting on 12/11/2021
            $table->string('approval_forum',255)->nullable();
            $table->string('approval_status',255)->nullable();
            $table->string('completion_forum',255)->nullable();
            $table->string('function_status',255)->nullable();
            $table->integer('handing_code')->nullable();
            $table->string('approved_cost',255)->nullable();
            $table->string('ts_cost',255)->nullable();
            $table->string('directive_sr_no',255)->nullable();
            // $table->string('completion_cost',255)->nullable();
            // $table->string('rehab_cost',255)->nullable();


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
        Schema::dropIfExists('scheme');
    }
}
