<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhifRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhif_rates', function (Blueprint $table) {
            $table->increments('nhif_rates_id');
            $table->integer('lower_limit_amount');
            $table->integer('upper_limit_amount');
            $table->integer('deduction');
            $table->integer('is_highest', 0);
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
        Schema::dropIfExists('nhif_rates');
    }
}
