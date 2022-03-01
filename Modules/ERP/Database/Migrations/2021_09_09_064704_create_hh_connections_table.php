<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHhConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hh_connections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hh_connections_scheme_idFk','255')->nullable();
            $table->string('hh_connections_sr_no','255')->nullable();
            $table->string('hh_connections_owner','255')->nullable();
            $table->string('hh_connections_member','255')->nullable();
            $table->string('hh_connections_cell_no','255')->nullable();
            $table->string('hh_connections_insert_term','255')->nullable();
            $table->string('hh_connections_updated_term','255')->nullable();
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
        Schema::dropIfExists('hh_connections');
    }
}
