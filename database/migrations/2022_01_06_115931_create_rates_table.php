<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{

    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('choose_home',100);
            $table->string('choose_operation',100);
            $table->integer('choose_price');
            $table->integer('choose_rate');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
