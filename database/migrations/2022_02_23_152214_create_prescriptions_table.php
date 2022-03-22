<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('assessment_id')->nullable();
            $table->integer('dosage')->nullable();
            $table->integer('duration')->nullable();
            $table->string('administration')->nullable(); //
            $table->boolean('hospital')->default(0); //
            //effective? , reaction, therapeutic_alternatives
            $table->timestamps();
            // NONMEDICAL PRESCRIPTION: id,patient_id, assessment_id, body, effective? , reaction,
            //Topical, Oral,Dental,Ophthalmic,Nasal,Sublingual,Rectal,Vaginal,Transdermal,Auricular (otic),
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
