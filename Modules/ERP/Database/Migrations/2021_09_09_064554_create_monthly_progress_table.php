<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mnth_prog_scheme_idFk')->nullable();
            $table->string('mnth_prog_month_code','255')->nullable();
            $table->string('mnth_prog_year_code','255')->nullable();
            $table->string('mnth_prog_phhysical_progress','255')->nullable();
            $table->string('mnth_prog_financial_progress','255')->nullable();
            $table->longText('mnth_prog_remarks')->nullable();
            $table->integer('mnth_prog_created_by')->nullable();
            $table->integer('mnth_prog_updated_by')->nullable();
            $table->string('mnth_prog_last_updated_term','255')->nullable();
            $table->integer('mnth_prog_province_idFk')->nullable();
            $table->string('mnth_prog_fin_upto_year','255')->nullable();
            $table->string('mnth_prog_pre_fin_prog','255')->nullable();
            $table->string('mnth_prog_submit','255')->nullable();
            $table->string('mnth_prog_financial_prog_upto','255')->nullable();
            $table->string('mnth_prog_se_ent_by','255')->nullable();
            $table->string('mnth_prog_se_ent_date','255')->nullable();
            $table->string('mnth_prog_se_ent_term','255')->nullable();
            $table->string('mnth_prog_ce_ent_by','255')->nullable();
            $table->string('mnth_prog_ce_submit','255')->nullable();
            $table->string('mnth_prog_ce_ent_date','255')->nullable();
            $table->string('mnth_prog_ce_ent_term','255')->nullable();
            $table->string('mnth_prog_hist_flag','255')->nullable();
            $table->string('mnth_prog_insert_term','255')->nullable();
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
        Schema::dropIfExists('monthly_progress');
    }
}
