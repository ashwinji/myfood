<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseIndentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_indents', function (Blueprint $table) {
            $table->increments('id');
            $table->date('indent_date');
            $table->string('status')->nullable()->comment('Pending, Send, Process, Complete')->default('Pending');
            $table->date('indent_complete')->nullable()->comment('all items status:Complete then purchase_indents status:Complete and completed date');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('purchase_indents');
    }
}
