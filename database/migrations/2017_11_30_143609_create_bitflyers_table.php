<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitflyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitflyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol');
            $table->dateTimeTz('datetime')->nullable();
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
        Schema::dropIfExists('bitflyers');
    }
}
