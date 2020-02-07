<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKedai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kedai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 300)->index();
            $table->string('address', 400)->index()->nullable();
            $table->string('phone', 50)->index()->nullable();
            $table->json('open_hours')->nullable();
            $table->json('photos')->nullable();
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
        Schema::dropIfExists('kedai');
    }
}
