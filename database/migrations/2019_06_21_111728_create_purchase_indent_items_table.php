<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseIndentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_indent_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_indent_id');
            $table->unsignedInteger('item_id')->comment('raw_material_master_id');
            $table->string('unit');
            $table->decimal('required_qty',9,2);
            $table->decimal('price',9,2);
            $table->decimal('accept_qty',9,2)->nullable();
            $table->enum('item_status',['Process','Complete'])->nullable()->default(null);
            $table->date('complete_date')->nullbale();

            $table->foreign('purchase_indent_id')->references('id')->on('purchase_indents')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_indent_items');
    }
}
