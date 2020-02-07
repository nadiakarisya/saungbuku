<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuKedai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_kedai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kedai_id')->nullable();
            $table->string('title', 150)->index();
            $table->text('description')->nullable();
            $table->bigInteger('price')->index()->default(0);
            $table->json('photos');
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
        Schema::dropIfExists('menu_kedai');
    }
}
