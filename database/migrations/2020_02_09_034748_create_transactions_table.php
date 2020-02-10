<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('asdos');
            $table->integer('dosen');
            $table->integer('activity_id');
            $table->text('keterangan');
            $table->date('dari');
            $table->date('sampai');
            $table->double('biaya');
            $table->enum('status', ['Mencari Asdos','Berjalan','Selesai','Dibatalkan']);
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
