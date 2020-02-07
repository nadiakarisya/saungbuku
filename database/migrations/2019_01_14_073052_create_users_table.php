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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groupid');
            $table->string('user_pickname', 50)->index();
            $table->string('password', 60);
            $table->string('user_coolname', 50)->index();
            $table->string('user_pic', 70)->nullable();
            $table->string('user_email', 50)->nullable();
            $table->string('notif', 1)->nullable();
            $table->string('status', 20)->default('AKTIF');
            $table->integer('salahpass')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
