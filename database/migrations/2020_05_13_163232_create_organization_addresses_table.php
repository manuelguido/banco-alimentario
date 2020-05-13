<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->bigInteger('number');
            $table->bigInteger('floor')->nullable()->default(NULL);
            $table->string('apt')->nullable()->default(NULL);
            $table->unsignedSmallInteger('neighborhood_id');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods');
            $table->unsignedSmallInteger('organization_id');
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
        Schema::dropIfExists('organization_addresses');
    }
}
