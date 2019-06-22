<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_plannings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meal_master_id');
            $table->integer('week_number')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->string('day_1')->nullable()->comment('Monday');
            $table->string('day_2')->nullable()->comment('Tuesday');
            $table->string('day_3')->nullable()->comment('Wednesday');
            $table->string('day_4')->nullable()->comment('Thursday');
            $table->string('day_5')->nullable()->comment('Friedday');
            $table->string('day_6')->nullable()->comment('Saterday');
            $table->string('day_7')->nullable()->comment('Sunday');

            $table->foreign('meal_master_id')->references('id')->on('meal_masters')->onDelete('cascade');
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
        Schema::dropIfExists('menu_plannings');
    }
}
