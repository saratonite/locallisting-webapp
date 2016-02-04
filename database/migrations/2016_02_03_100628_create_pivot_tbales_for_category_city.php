<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTbalesForCategoryCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_categories',function(Blueprint $table)){

            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->interger('category_id')->unsigned();
            $table->timestamps();

            // Foreign keys
            $table->foreignKey('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreignKey('category_id')->references('id')->on('categories')->onDelete('cascade');

        });

         Schema::create('vendor_cities',function(Blueprint $table)){

            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->interger('city_id')->unsigned();
            $table->timestamps();

            // Foreign keys
            $table->foreignKey('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreignKey('city_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
