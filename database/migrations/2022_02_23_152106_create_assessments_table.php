<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->text('symptoms')->nullable();
            $table->unsignedBigInteger('disease_id');
            $table->string('treatment');
            $table->timestamps();
            // patient_id, pregnant, pregnancy_year,BP(mmHg), PR(Beats/min), 
			// Tempv(degree celcius), Weight(kg), Height(m), BMI (kg/m), Complaints, physical assessment, laboratory, diagnosis, medical plan, desired outcome, achieved?, outcome achieved
			// next appointnment,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
