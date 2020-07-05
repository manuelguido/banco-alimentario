<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusIdToUnsubscribeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unsubscribe_requests', function (Blueprint $table) {
            $table->unsignedTinyInteger('unsubscribe_status_id');
            $table->foreign('unsubscribe_status_id')->references('unsubscribe_status_id')->on('unsubscribe_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unsubscribe_requests', function (Blueprint $table) {
            //
        });
    }
}
