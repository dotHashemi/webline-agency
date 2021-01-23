<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('portfolio')->nullable();
            $table->string('customer', 50);
            $table->string('thumbnail');
            $table->string('post', 50);
            $table->text('body');
            $table->boolean('selected')->default(false);
            $table->dateTime('created')->useCurrent();

            $table->foreign('portfolio')->references('id')->on('portfolios')->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
