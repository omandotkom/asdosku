<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prefers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('service_id');
            $table->integer('activity_id');
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
        Schema::dropIfExists('prefers');
    }
}
