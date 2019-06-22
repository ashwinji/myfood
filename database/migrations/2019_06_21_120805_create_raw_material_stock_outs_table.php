<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawMaterialStockOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_material_stock_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id')->comment('raw_material_master_id');
            $table->unsignedInteger('created_by')->comment('Chef / User id');
            $table->string('old_stock');
            $table->string('change_stock');
            $table->string('new_stock');

            $table->foreign('item_id')->references('id')->on('raw_material_masters')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('raw_material_stock_outs');
    }
}
