<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('returned_id');
            $table->unsignedBigInteger('inventory_id');
            $table->string('batch_no');
            $table->integer('quantity')->default(1);
            $table->double('unit_cost')->default(0);
            $table->double('amount')->default(0);
            $table->timestamps();
            $table->foreign('returned_id')->references('id')->on('returneds')->onDelete('cascade');
            $table->foreign('purchase_details_id')->references('id')->on('purchase_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returned_Drugs');
    }
}
