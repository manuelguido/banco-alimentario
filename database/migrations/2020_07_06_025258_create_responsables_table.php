<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->increments('responsable_id');
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->string('phone', 50);
            // Adds document type and number to responsables
            $table->unsignedTinyInteger('document_type_id');
            $table->foreign('document_type_id')->references('document_type_id')->on('document_types');
            $table->integer('document_number');
            // Adds institution to responsables
            $table->unsignedTinyInteger('institution_id');
            $table->foreign('institution_id')->references('institution_id')->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
