<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunitySharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('community_shares_scheme_idFk','255')->nullable();
            $table->string('community_shares_deposit_date','255')->nullable();
            $table->string('community_shares_dd_no','255')->nullable();
            $table->string('community_shares_amount','255')->nullable();
            $table->string('community_shares_remarks','255')->nullable();
            $table->string('community_shares_insert_term','255')->nullable();
            $table->string('community_shares_updated_term','255')->nullable();
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
        Schema::dropIfExists('community_shares');
    }
}
