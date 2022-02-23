<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('roles')->insert(array(
            array('id' => 1, 'name'=> 'admin', 'description'=>'super admin of system'),
            array('id' => 2, 'name'=> 'director', 'description'=>'director of pharmacies'),
            array('id' => 3, 'name'=> 'pharmacist', 'description'=>'specialist in a pharmacy'),
            array('id' => 4, 'name'=> 'sales', 'description'=>'Sales Representative in a pharmacy'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
