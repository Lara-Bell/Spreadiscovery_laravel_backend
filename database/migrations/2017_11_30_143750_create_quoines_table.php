<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quoines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol');
            $table->dateTimeTz('datetime')->nullable();
            $table->float('high', 20, 5);
            $table->float('low', 20, 5);
            $table->float('bid', 20, 5);
            $table->float('ask', 20, 5);
            $table->float('last', 20, 5);
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
        Schema::dropIfExists('quoines');
    }
}
