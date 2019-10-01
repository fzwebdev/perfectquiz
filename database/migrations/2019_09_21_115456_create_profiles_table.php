<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name', 35)->nullable();
            $table->string('fatherName', 35)->nullable();
            $table->unsignedInteger('classID');
            $table->string('contactNo', 15)->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('registerDeviceID', 150)->nullable();
            $table->string('registeredDeviceName', 150)->nullable();
            $table->string('slug')->unique()->nullable();
            $table->unsignedInteger('status');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::table('profiles', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
    }
}
