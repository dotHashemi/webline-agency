<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key', 50)->unique();
            $table->text('value');
            $table->text('tags')->nullable();
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('options');
    }
}
