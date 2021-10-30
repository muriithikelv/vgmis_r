<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNssfRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nssf_rates', function (Blueprint $table) {
            $table->increments('nssf_rates_id');
            $table->integer('lower_limit_amount');
            $table->integer('lower_limit_rate');
            $table->integer('upper_limit_amount');
            $table->integer('old_contribution_amount');
            $table->string('effective_contribution');
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
        //
    }
}
