<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_id');
            $table->integer('activity_id');
            $table->integer('user_id');
            $table->integer('transaction_id')->nullable();
            $table->date('dari')->nullable();;
            $table->date('sampai')->nullable();;
            $table->date('datemax')->nullable();
            $table->text('keterangan')->nullable();;
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('bids');
    }
}
