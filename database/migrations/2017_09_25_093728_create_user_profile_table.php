<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('phone');
            $table->string('address');
            $table->string('facebook_profile');
            $table->string('experience');
            $table->string('facebook_pages');
            $table->timestamps();
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
