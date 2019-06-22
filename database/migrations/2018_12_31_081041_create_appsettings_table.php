<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appsettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name')->nullable();
            $table->string('app_logo')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('mobilenum')->nullable();

            $table->string('item_received_day')->default('1')->comment('1 (for Monday)');
            $table->string('production_day')->default('2')->comment('2 (for Tuesday)');
            $table->string('delivery_day')->default('3')->comment('1 (for Wednesday)');

            $table->text('seo_keyword')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('google_analytics')->nullable();
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
        Schema::dropIfExists('appsettings');
    }
}
