<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product', 80);
            $table->unsignedSmallInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->unsignedTinyInteger('unit_of_measurement_id');
            $table->foreign('unit_of_measurement_id')->references('unit_of_measurement_id')->on('units_of_measurement');
            $table->boolean('is_refigerable')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
