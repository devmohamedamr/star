<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cruise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruise',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('language_id');
            $table->integer('city_id');
            $table->integer('feature_id');
            $table->string('lan');
            $table->string('lat');
            $table->float('price');
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
        Schema::dropIfExists('cruise');

    }
}
