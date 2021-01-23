<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('father')->nullable();
            $table->string('title', 50)->unique();

            $table->foreign('father')->references('id')->on('categories')->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
