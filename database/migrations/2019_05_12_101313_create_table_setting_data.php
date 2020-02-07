<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_data', function (Blueprint $table) {
            $table->string('key', 100)->nullable()->index();
            $table->string('values', 255)->nullable()->index();
            $table->integer('status')->default(1)->comment('1:AKTIF, 2:NONAKTIF');
            $table->string('keterangan', 70)->nullable()->index();
            $table->string('kdwil', 4)->nullable()->index();
            $table->string('unitap', 15)->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_data');
    }
}
