<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawMaterialReceivingTransectionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_material_receiving_transection_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_indent_id');
            $table->unsignedInteger('purchase_indent_item_id');
            $table->unsignedInteger('item_id')->comment('raw_material_master_id');
            $table->decimal('qty',9,2);
            $table->integer('created_by');

            $table->foreign('purchase_indent_id')->references('id')->on('purchase_indents')->onDelete('cascade');
            $table->foreign('purchase_indent_item_id')->references('id')->on('purchase_indent_items')->onDelete('cascade');
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
        Schema::dropIfExists('raw_material_receiving_transection_logs');
    }
}
