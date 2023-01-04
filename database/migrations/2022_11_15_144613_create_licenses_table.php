<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->text('number');
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('duration_days');
            $table->unsignedBigInteger('pharmacy_id')->nullable();
            $table->timestamp('start_at');
            $table->timestamp('warn_at');
            $table->timestamp('expire_at');
            $table->softDeletes();
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
        Schema::dropIfExists('licenses');
    }
}
