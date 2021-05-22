<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');


            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('address', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::table('orders', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');


            $table->foreign('user_id')->references('id')->on('users');
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
