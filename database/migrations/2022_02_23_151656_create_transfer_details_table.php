<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('inventory_id');
            $table->string('batch_no');
            $table->string('packaging_type');
            $table->integer('quantity')->default(1);
            $table->double('unit_price')->default(0);
            $table->integer('unit_order')->default(1);
            $table->double('unit_cost')->default(0);
            $table->double('amount')->default(0);
            $table->date('expire_at');
            $table->timestamps();
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->foreign('transfer_id')->references('id')->on('transfers')->onDelete('cascade');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_details');
    }
}
