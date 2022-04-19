<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('orderable_id');
            $table->string('orderable_type'); //subscription, prescription
            $table->unsignedBigInteger('sale_id')->nullable(); // 
            $table->double('amount')->default(0);
            $table->integer('quantity')->default(1);
            $table->double('total')->default(0);
            $table->boolean('status')->default(0);
            $table->SoftDeletes();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->unsignedBigInteger('sale_id')->on('sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
