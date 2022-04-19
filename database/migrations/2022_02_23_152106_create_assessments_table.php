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
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('appointment_id');
            $table->text('symptoms')->nullable();//Complaints,
            $table->text('vitals')->nullable();//physical assessment, pregnant, pregnancy_year,BP(mmHg), PR(Beats/min), 
			// Tempv(degree celcius), Weight(kg), Height(m), BMI (kg/m)
            $table->text('diagnosis')->nullable();//diagnosis
            $table->text('treatment_plan')->nullable(); //medical plan
            $table->text('non_medication_plan')->nullable();
            $table->text('laboratory_tests')->nullable();
            $table->timestamps();
            // ,  
             // laboratory, , , 
            //desired outcome, achieved?, outcome achieved
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
