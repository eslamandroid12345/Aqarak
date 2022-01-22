<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToHousesTable extends Migration
{

    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {

            $table->boolean('status')->after('filename');
        });
    }


    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            //
        });
    }
}
