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
            $table->double('subtotal')->default(0);
            $table->double('vat')->default(0);
            $table->double('shipping_fee')->default(0);
            $table->double('total')->default(0);
            $table->timestamp('delivered_at')->nullable();
            $table->string('status')->nullable(); //processing, on-hold, ready, completed, cancelled, refunded, failed and trash, delivered. Default is processing.
            $table->SoftDeletes();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->unsignedBigInteger('payment_id')->on('payments')->onDelete('cascade');
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
