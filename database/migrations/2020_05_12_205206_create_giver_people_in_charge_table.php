<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiverPeopleInChargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giver_people_in_charge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('dni');
            $table->string('email');
            $table->smallInteger('phone');
            $table->unsignedInteger('giver_id');
            $table->foreign('giver_id')->references('id')->on('givers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giver_people_in_charge');
    }
}
