<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationRejectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_rejections', function (Blueprint $table) {
            $table->unsignedBigInteger('donation_id')->unique();
            $table->foreign('donation_id')->references('donation_id')->on('donations')->onDelete('cascade');
            $table->string('reason');
            $table->unsignedInteger('rejecter_id');
            $table->foreign('rejecter_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_rejections');
    }
}
