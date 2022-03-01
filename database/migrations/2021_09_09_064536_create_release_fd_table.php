<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleaseFdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_fd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rel_fd_scheme_idFk')->nullable();
            $table->string('rel_fd_block_code','255')->nullable();
            $table->string('rel_fd_adp_year_code','255')->nullable();
            $table->string('rel_fd_adp_no','255')->nullable();
            $table->string('rel_fd_status','255')->nullable();
            $table->string('rel_fd_date','255')->nullable();
            $table->string('rel_fd_code','255')->nullable();
            $table->bigInteger('rel_fd_amount')->nullable();
            $table->bigInteger('rel_fd_capital')->nullable();
            $table->bigInteger('rel_fd_revenue')->nullable();
            $table->bigInteger('rel_fd_foreign_aid')->nullable();
            $table->integer('rel_fd_created_by')->nullable();
            $table->integer('rel_fd_updated_by')->nullable();
            $table->string('rel_fd_last_updated_term','255')->nullable();
            $table->integer('rel_fd_province_idFk')->nullable();
            $table->string('rel_fd_mnth_code','255')->nullable();
            $table->string('rel_fd_hist_flag','255')->nullable();
            $table->string('rel_fd_prog_code','255')->nullable();
            $table->string('rel_fd_insert_term','255')->nullable();
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
        Schema::dropIfExists('release_fd');
    }
}
