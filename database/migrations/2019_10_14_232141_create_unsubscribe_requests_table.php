<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnsubscribeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unsubscribe_requests', function (Blueprint $table) {
            $table->increments('unsubscribe_request_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedInteger('confirmer_id');
            $table->foreign('confirmer_id')->references('user_id')->on('users');
            $table->string('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unsubscribe_requests');
    }
}
