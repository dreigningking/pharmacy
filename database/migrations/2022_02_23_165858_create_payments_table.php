<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->unsignedBigInteger('user_id'); //the sender
            $table->unsignedBigInteger('subscription_id'); //the subscription
            $table->string('currency');
            $table->double('amount')->default(0); 
            $table->string('method'); //card, bank, ussd  
            $table->string('status'); // successful, failed, cancelled 
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
        Schema::dropIfExists('payments');
    }
}
