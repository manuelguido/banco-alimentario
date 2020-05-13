<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationPeopleInChargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_people_in_charge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('dni');
            $table->string('email');
            $table->smallInteger('phone');
            $table->unsignedInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_people_in_charge');
    }
}
