<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleasePndTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_pnd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rel_scheme_idFk')->nullable();
            $table->string('rel_block_code','255')->nullable();
            $table->string('rel_adp_year_code','255')->nullable();
            $table->string('rel_adp_no','255')->nullable();
            $table->string('rel_status','255')->nullable();
            $table->string('rel_date','255')->nullable();
            $table->bigInteger('rel_amount')->nullable();
            $table->bigInteger('rel_capital')->nullable();
            $table->bigInteger('rel_revenue')->nullable();
            $table->bigInteger('rel_foreign_aid')->nullable();
            $table->string('rel_new_ongoing_code','255')->nullable();
            $table->string('rel_prog_code','255')->nullable();
            $table->integer('rel_created_by')->nullable();
            $table->integer('rel_updated_by')->nullable();
            $table->string('rel_last_updated_term','255')->nullable();
            $table->integer('rel_province_idFk')->nullable();
            $table->string('rel_hist_flag','255')->nullable();
            $table->string('rel_insert_term','255')->nullable();
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
        Schema::dropIfExists('release_pnd');
    }
}
