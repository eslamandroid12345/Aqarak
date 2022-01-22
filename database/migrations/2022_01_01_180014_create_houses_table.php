<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{

    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {


            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('add_title',100);
            $table->string('house_title',100);
            $table->longText('description');
            $table->integer('phone_1')->default('01019700137');
            $table->integer('phone_2')->default('01014183020');
            $table->integer('phone_3')->default('01012027253');
            $table->string('department',100);
            $table->string('title_type',100);
            $table->integer('price');
            $table->integer('room_number');
            $table->integer('bathroom_number');
            $table->integer('space');
            $table->date('date_day');
            $table->string('filename',255);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
