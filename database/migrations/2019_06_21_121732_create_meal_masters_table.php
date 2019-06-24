<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meal_name')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
<<<<<<< HEAD
    /*{
        recipe: 1,
        recipe: 2,
        recipe: 3,
        recipe: 5,
    }*/
=======
>>>>>>> 1ecdb255b07d939fb54fdf45438d06ff526fb4c8

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_masters');
    }
}
