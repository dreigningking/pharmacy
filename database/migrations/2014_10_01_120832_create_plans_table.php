<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->text('features')->nullable();
            $table->double('amount')->default(0);
            $table->integer('trial')->default(0);
            $table->timestamps();
        });
        DB::table('plans')->insert(array(
            array('id' => 1, 'name'=> 'Pharmacy Subscription', 'description'=>'Subscription for each pharmacy','features'=> '["Create unlimited pharmacies" , "Have unlimited users in all roles for each pharmacy" , "Transfer and share info across pharmacies" , "Import existing data from excel to application e.g Drug Supplies, Staff, Patient Records etc" , "Export your data in excel, csv or pdf format"]','amount'=> 1000,'trial'=>14),
            array('id' => 2, 'name'=> 'SMS Credit', 'description'=>'Credit to send bulk sms to patients','features'=> '["Send Prescription by SMS to Patients" , "Send Checkup SMS to followup on patients" , "Get Stock Level Notification by SMS" , "Get Notified of activities you subscribe to listen for"]','amount'=> 2,'trial'=>5),
        ));
    }

    /** sudo certbot --apache -d trenko.com -d www.trenko.com -d kephrenng.com -d  


     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
