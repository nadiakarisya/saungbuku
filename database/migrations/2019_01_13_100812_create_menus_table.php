<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 200)->nullable()->index();
            $table->string('uri', 200)->nullable()->index();
            $table->integer('id_menu_induk')->nullable();
            $table->integer('id_menu_anak')->nullable();
            $table->integer('urutan')->nullable();
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->string('icon', 50)->nullable();
            $table->string('class', 25)->nullable();
            $table->string('keterangan', 30)->default('0');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
