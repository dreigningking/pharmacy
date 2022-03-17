<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('email');
            $table->string('mobile');
            $table->string('image')->nullable();
            $table->string('license')->nullable();
            $table->string('type');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->bigInteger('sms_credit')->default(0);
            $table->boolean('send_patient_sms')->default(0);
            $table->boolean('send_patient_email')->default(1);
            $table->integer('minimum_stocklevel')->default(1);
            $table->bigInteger('maximum_stocklevel')->default(1);
            $table->integer('mark_up')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacies');
    }
}
