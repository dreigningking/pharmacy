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
            $table->unsignedBigInteger('drug_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('assessment_id')->nullable();
            $table->integer('morning')->default(0);
            $table->integer('afternoon')->default(0);
            $table->integer('night')->default(0);
            $table->integer('duration')->nullable();//days
            $table->string('administration')->nullable(); ////Topical, Oral,Dental,Ophthalmic,Nasal,Sublingual,Rectal,Vaginal,Transdermal,Auricular (otic),
            $table->string('origin')->nullable(); //hospital, pharmacy, 
            $table->text('remark')->nullable(); //
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
        Schema::dropIfExists('prescriptions');
    }
}
