<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->unsignedBigInteger('inventory_id');
            $table->string('package_type')->default('packs');
            $table->string('batch_no')->nullable();
            $table->date('expire_at')->nullable();
            $table->double('cost')->default(0);
            $table->integer('quantity')->default(1);
            $table->integer('amount')->default(1);
            $table->integer('markup')->default(1); //
            $table->string('markup_type')->default('amount'); //amount/percentage
            $table->integer('sellable_units')->default(1);
            $table->timestamps();
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
