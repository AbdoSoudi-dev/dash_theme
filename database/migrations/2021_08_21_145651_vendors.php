<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vendors',function ( Blueprint $table ){
            $table->id();
            $table->string('name');
            $table->string("nick_name");
            $table->string("address");
            $table->integer("mobile_number");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->timestamps();
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
