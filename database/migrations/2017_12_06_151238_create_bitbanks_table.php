<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitbanks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol');
            $table->dateTimeTz('datetime')->nullable();
            $table->float('high', 10, 2);
            $table->float('low', 10, 2);
            $table->float('bid', 10, 2);
            $table->float('ask', 10, 2);
            $table->float('last', 10, 2);
            $table->float('baseVolume', 20, 8);

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
        Schema::dropIfExists('bitbanks');
    }
}
