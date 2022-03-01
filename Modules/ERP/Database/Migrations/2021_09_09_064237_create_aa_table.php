<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('aa_scheme_idFk')->nullable();
            $table->string('aa_doc_no','255')->nullable();
            $table->string('aa_date','255')->nullable();
            $table->bigInteger('aa_amount')->nullable();
            $table->string('aa_status','255')->nullable();
            $table->string('aa_app_code','255')->nullable();
            $table->string('aa_auth','255')->nullable();
            $table->longText('aa_remarks')->nullable();
            $table->integer('aa_created_by')->nullable();
            $table->integer('aa_updated_by')->nullable();
            $table->integer('aa_province_idFk')->nullable();
            $table->string('aa_forum_code','255')->nullable();
            $table->longText('aa_file_path')->nullable();
            $table->string('aa_insert_term','255')->nullable();
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
        Schema::dropIfExists('aa');
    }
}
