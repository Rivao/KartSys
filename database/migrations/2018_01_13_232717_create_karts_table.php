<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateKartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kart_nr');
            $table->string('model');
            $table->boolean('usable')->default(true)->nullable();
            $table->boolean('on_track')->default(false)->nullable();
            $table->boolean('broken')->defaul(false)->nullable();
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
        Schema::dropIfExists('karts');
    }
}
