<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nik')->nullable();
            $table->string('kampus_dosen')->nullable();
            $table->integer('kampus_id')->nullable();
            $table->string('wa')->nullable();
            $table->string('gender')->nullable();
            $table->string('semester')->nullable();
            $table->integer('jurusan_id')->nullable();
            $table->text('alamat')->nullable();
            $table->text('prefer')->nullable();
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
        Schema::dropIfExists('details');
    }
}
