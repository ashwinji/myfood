<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_assigns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chef_id')->comment('user id');
            $table->unsignedInteger('recipe_master_id');
            $table->integer('assigned_qty');
            $table->date('assigned_date');

            $table->integer('prepared_qty')->nullable();
            $table->date('prepared_date')->nullable();
            $table->text('reason')->nullable();

            $table->foreign('chef_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('task_assigns');
    }
}
