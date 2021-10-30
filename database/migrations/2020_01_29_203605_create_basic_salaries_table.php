<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_salaries', function (Blueprint $table) {
            $table->increments('basic_salary_id');
            $table->integer('employee_id')->unsigned();
            $table->integer('basic_salary_amount');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();

            //$table->foreign('employee_id')->references('employee_id')->on('employees');
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
