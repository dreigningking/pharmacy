<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->double('monthly')->default(0);
            $table->double('quaterly')->default(0);
            $table->double('annually')->default(0);
            $table->timestamps();
        });
        DB::table('plans')->insert(array(
            array('id' => 1, 'name'=> 'Bronze', 'description'=>'super admin of system'),
            array('id' => 2, 'name'=> 'Silver', 'description'=>'director of pharmacies'),
            array('id' => 3, 'name'=> 'Gold', 'description'=>'specialist in a pharmacy'),
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
