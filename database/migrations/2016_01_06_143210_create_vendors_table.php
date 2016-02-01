<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('vendor_name');
            $table->text('description');
            $table->integer('category_id')->nullable();
            $table->integer('city_id')->nullable(); 
            $table->string('addr_line1')->nullable();
            $table->string('addr_line2')->nullable();
            $table->string('addr_line3')->nullable();        
            $table->string('zip_code',10)->nullable();        
            $table->string('contact_number',15);
            $table->string('mobile',15);
            $table->timestamps();


            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           //$table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            //$table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); // Referece to states table


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vendors');
    }
}
