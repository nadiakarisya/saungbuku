<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuAksesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_akses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_menu')->index();
            $table->integer('id_pengguna_grup')->index();
            $table->string('status', 3)->default('1');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_akses');
    }
}
