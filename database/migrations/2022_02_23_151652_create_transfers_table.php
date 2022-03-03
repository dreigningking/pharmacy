<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sending_user');
            $table->unsignedBigInteger('from_pharmacy');
            $table->unsignedBigInteger('to_pharmacy');
            $table->unsignedBigInteger('receiving_user');
            $table->double('total');
            $table->boolean('received')->default(0);
            $table->timestamps();
            $table->foreign('sending_user')->references('id')->on('users');
            $table->foreign('receiving_user')->references('id')->on('users');
            $table->foreign('from_pharmacy')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->foreign('to_pharmacy')->references('id')->on('pharmacies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
