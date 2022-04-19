<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pharmacy_id'); //seller
            $table->unsignedBigInteger('patient_id'); //patient
            $table->unsignedBigInteger('prescription_id');
            $table->double('subtotal')->default(0);
            $table->double('vat')->default(0);
            $table->double('shipping_fee')->default(0);
            $table->double('total')->default(0);
            $table->string('status')->nullable(); //processing, on-hold, ready, completed, cancelled, refunded, failed and trash, delivered. Default is processing.
            $table->timestamp('delivered_at')->nullable();
            $table->SoftDeletes();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            // SALES : prescription_id, quantity, amount, payment_method
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
