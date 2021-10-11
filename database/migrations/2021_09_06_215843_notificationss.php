<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notificationss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications',function (Blueprint $table){
            $table->id();
            $table->string("title");
            $table->string("type");
            $table->boolean("opened")->default(false);
            $table->dateTime("opened_at")->nullable();
            $table->boolean("seen")->default(false);
            $table->dateTime("seen_at")->nullable();
            $table->unsignedBigInteger("notifier_id")->nullable();

            $table->unsignedBigInteger("user_id");


            $table->foreign('user_id')->references('id')->on('users')->onDelete("set null");
            $table->foreign('notifier_id')->references('id')->on('users')->onDelete("set null");
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
