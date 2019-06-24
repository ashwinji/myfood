<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawMaterialStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_material_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id')->comment('raw_material_master_id');
            $table->decimal('minimum_qty', 9, 3)->default('0.000');
            $table->decimal('current_stock', 9, 3)->default('0.000');
            $table->enum('stock_type',['Automatic', 'Manually'])->comment('if qty will be deduct during create Recipe : status will be Automatic, Opposite: Manually');
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
        Schema::dropIfExists('raw_material_stocks');
    }
}
