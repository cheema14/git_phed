<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asset_scheme_idFk','255')->nullable();
            $table->string('assets_type_code','255')->nullable();
            $table->longText('assets_description')->nullable();
            $table->string('assets_capacity_unit','255')->nullable();
            $table->string('assets_insert_term','255')->nullable();
            $table->string('assets_updated_term','255')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
