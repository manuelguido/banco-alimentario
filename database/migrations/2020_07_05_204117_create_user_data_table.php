<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            // User key
            $table->unsignedInteger('user_id')->unique();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            // User data
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->string('phone', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
