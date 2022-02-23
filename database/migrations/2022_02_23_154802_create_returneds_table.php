<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returneds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_detail_id');
            $table->unsignedBigInteger('product_id');
            $table->string('reason');
            $table->double('total')->default(0);
            $table->string('status')->default('waiting'); //waiting, held, cancelled, released
            $table->SoftDeletes();
            $table->timestamps();
            $table->foreign('order_detail_id')->references('id')->on('order_details');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returneds');
    }
}
