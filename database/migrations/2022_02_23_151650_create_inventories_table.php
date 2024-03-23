<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drug_id')->nullable();
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('shelf_id')->nullable();
            $table->string('name');
            $table->double('unit_cost')->default(0); //cost price of one tablet
            $table->double('unit_price')->default(0); //price of one tablet
            $table->string('quantity')->default(0); //this will be computed by batches
            $table->timestamps();
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->foreign('shelf_id')->references('id')->on('shelves')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
