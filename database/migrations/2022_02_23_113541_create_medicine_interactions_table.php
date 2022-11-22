<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_interactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_a');
            $table->unsignedBigInteger('medicine_b');
            $table->text('reaction')->nullable(); //contraindicated, look for alternative ,monitor closely, good
            $table->timestamps();
            $table->foreign('medicine_a')->references('id')->on('medicines')->onDelete('cascade');
            $table->foreign('medicine_b')->references('id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_interactions');
    }
}
