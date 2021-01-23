<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->string('phone', 13)->unique();
            $table->string('ip', 50);
            $table->text('tags')->nullable();
            $table->boolean('isEmailNewsLetter')->default(true);
            $table->boolean('isSMSNewsLetter')->default(true);
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('members');
    }
}
