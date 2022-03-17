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
            array('id' => 1, 'name'=> 'base_currency', 'value'=>'Naira'),
            array('id' => 2, 'name'=> 'base_currency_symbol', 'value'=>'N'),
            array('id' => 3, 'name'=> 'allow_user_in_multiple_pharmacy', 'value'=> 1),
            array('id' => 4, 'name'=> 'allow_sms_notification', 'value'=> 0),
            array('id' => 5, 'name'=> 'require_strong_password', 'value'=> 1),
            array('id' => 6, 'name'=> 'base_subscription_discount', 'value'=> 2),
            // array('id' => 8, 'name'=> 'base_subscription_discount_percent', 'value'=> 2),
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
