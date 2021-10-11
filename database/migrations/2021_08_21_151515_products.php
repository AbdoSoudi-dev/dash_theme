<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function ( Blueprint $table ){
            $table->id();
            $table->string('name');
            $table->integer("quantity");
            $table->string("buying_price");
            $table->string("selling_price");
            $table->integer("code");
            $table->string("images");
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("vendor_id")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories')->onDelete("set null");
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete("set null");
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete("set null");
            $table->foreign('user_id')->references('id')->on('users')->onDelete("set null");

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
