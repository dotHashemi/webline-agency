<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role', 10);
            $table->string('name', 20);
            $table->string('email')->unique();
            $table->string('phone', 11)->unique();
            $table->string('password');
            $table->bigInteger('version')->default(0);
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
