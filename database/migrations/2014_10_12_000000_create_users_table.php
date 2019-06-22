<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('userType', ['admin', 'manager', 'chef', 'customer'])->default('chef');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('zipCode')->nullable();
            
            $table->string('api_token')->unique();
            $table->string('locktimeout')->default('10')->comment('System auto logout if no activity found.');
            $table->enum('status', ['0','1','2'])->default('1')->comment('0:Inactive, 1:Active, 2:Delete');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
