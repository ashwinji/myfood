<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealAndRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_and_recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meal_master_id');
            $table->unsignedInteger('recipe_master_id');

            $table->foreign('meal_master_id')->references('id')->on('meal_masters')->onDelete('cascade');
            $table->foreign('recipe_master_id')->references('id')->on('recipe_masters')->onDelete('cascade');
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
        Schema::dropIfExists('meal_and_recipes');
    }
}
