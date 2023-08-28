<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });
        DB::table('settings')->insert(array(
            array('id' => 1, 'name'=> 'pharmacy_plan', 'value'=> ['price_ngn'=> 2500,'price_usd'=> 25]),
            array('id' => 2, 'name'=> 'analytics_plan', 'value'=> ['price_ngn'=> 2500,'price_usd'=> 25]),
            array('id' => 3, 'name'=> 'sms_plan', 'value'=> ['price_ngn'=> 2500,'price_usd'=> 25]),
            array('id' => 4, 'name'=> 'subscription_minimum_months', 'value'=> 1),
            array('id' => 5, 'name'=> 'subscription_trial_days', 'value'=> 7),
            array('id' => 6, 'name'=> 'subscription_discount', 'value'=> [10,20]),
            array('id' => 7, 'name'=> 'sms_minimum_units', 'value'=> 10),
            array('id' => 8, 'name'=> 'require_strong_password', 'value'=> 1),
            
            
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
