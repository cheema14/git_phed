<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnhancementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enhancement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enhancement_scheme_idFk','255')->nullable();
            $table->string('enhancement_date','255')->nullable();
            $table->integer('enhancement_amount')->nullable();
            $table->string('enhancement_auth','255')->nullable();
            $table->string('enhancement_doc_no','255')->nullable();
            $table->longText('enhancement_remarks')->nullable();
            $table->string('enhancement_status','255')->nullable();
            $table->integer('enhancement_app_code')->nullable();
            $table->string('enhancement_insert_term','255')->nullable();
            $table->string('enhancement_updated_term','255')->nullable();
            $table->string('enhancement_enh_sr_no','255')->nullable();
            $table->integer('enhancement_province_idFk')->nullable();
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
        Schema::dropIfExists('enhancement');
    }
}
