<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20);
            $table->string('email', 100);
            $table->string('phone', 13);
            $table->string('website', 50)->nullable();
            $table->text('body');
            $table->boolean('isReaded')->default(false);
            $table->dateTime('created')->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
