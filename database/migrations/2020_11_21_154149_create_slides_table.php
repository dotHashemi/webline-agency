<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->string('link');
            $table->string('thumbnail');
            $table->string('type', 10)->default('big');
            $table->boolean('status')->default(1);
            $table->dateTime('created')->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
