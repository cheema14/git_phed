<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ts_scheme_idFk')->nullable();
            // $table->string('ts_level','255')->nullable();
            $table->string('ts_date','255')->nullable();
            $table->string('ts_doc_no','255')->nullable();
            $table->integer('ts_province_idFk')->nullable();
            $table->string('ts_status','255')->nullable();
            $table->string('ts_app_code','255')->nullable();
            $table->bigInteger('ts_amount')->nullable();
            $table->string('ts_auth','255')->nullable();
            $table->longText('ts_remarks')->nullable();
            $table->integer('ts_created_by')->nullable();
            $table->integer('ts_updated_by')->nullable();
            $table->string('ts_insert_term','255')->nullable();
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
        Schema::dropIfExists('ts');
    }
}
