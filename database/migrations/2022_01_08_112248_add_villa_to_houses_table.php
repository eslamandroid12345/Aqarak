<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVillaToHousesTable extends Migration
{
  
    
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            
            $table->string('villa',100)->after('house_title');
        });
    }

  
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            
        });
    }
}
