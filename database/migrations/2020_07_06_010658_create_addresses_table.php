<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('address_id');
            $table->string('street', 50);
            $table->integer('number');
            $table->tinyInteger('floor')->nullabe();
            $table->string('apt', 4)->nullabe();
            // Neighborhood key
            $table->unsignedSmallInteger('neighborhood_id');
            $table->foreign('neighborhood_id')->references('neighborhood_id')->on('neighborhoods');
            // Institution key
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
