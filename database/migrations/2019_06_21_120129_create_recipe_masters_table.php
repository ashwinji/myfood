<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('image_path')->comment('save complete image path');
            $table->text('recipe_info');
            $table->text('recipe_method');
            $table->boolean('recipe_status')->default(true);
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
        Schema::dropIfExists('recipe_masters');
    }
}
