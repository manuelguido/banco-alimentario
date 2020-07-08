<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationRetirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_retirements', function (Blueprint $table) {
            $table->unsignedBigInteger('donation_id');
            $table->foreign('donation_id')->references('donation_id')->on('donations')->onDelete('cascade');
            $table->timestamps('retirement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_retirements');
    }
}
