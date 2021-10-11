<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer("mobile_number");
            $table->string("gender")->default("male");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("address");
            $table->string("client_code")->unique();
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
