<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recipe_master_id');
            $table->unsignedInteger('item_id')->comment('raw_material_master_id');
            $table->decimal('standard_qty', 9,3);

            $table->foreign('recipe_master_id')->references('id')->on('recipe_masters')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('raw_material_masters')->onDelete('cascade');
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
        Schema::dropIfExists('ingredients');
    }
}
