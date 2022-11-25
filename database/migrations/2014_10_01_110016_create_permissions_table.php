<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('permissions')->insert(array(
            array('id' => 1, 'name'=> 'role', 'description'=>'Role Management'),
            array('id' => 2, 'name'=> 'subscription', 'description'=>'Pharmacy Subscription'),
            array('id' => 3, 'name'=> 'user', 'description'=>'User Management'),
            array('id' => 4, 'name'=> 'pharmacy', 'description'=>'Pharmacy Management'),
            array('id' => 5, 'name'=> 'supplier', 'description'=>'Pharmacy Suppliers'),
            array('id' => 6, 'name'=> 'inventory', 'description'=>'Pharmacy Inventory'),
            array('id' => 7, 'name'=> 'patient', 'description'=>'Pharmacy Patients'),
            array('id' => 8, 'name'=> 'assessment', 'description'=>'Patient Assessments'),
            array('id' => 9, 'name'=> 'sales', 'description'=>'Medicine Sales'),
            array('id' => 10, 'name'=> 'settings', 'description'=>'System Settings'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
