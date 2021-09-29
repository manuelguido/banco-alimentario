<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('donation_id');
            $table->unsignedInteger('user_id')->unique();
            $table->foreign('user_id')->references('user_id')->on('givers')->onDelete('cascade');
            $table->unsignedInteger('user_responsable_id')->nullable()->default(NULL);
            $table->foreign('user_responsable_id')->references('user_id')->on('users');
            $table->string('code', 80)->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
