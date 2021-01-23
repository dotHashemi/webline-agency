<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service');
            $table->string('title', 50);
            $table->string('customer', 50);
            $table->string('thumbnail');
            $table->string('link')->nullable();
            $table->text('body');
            $table->text('tags');
            $table->string('slug')->unique();
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();

            $table->foreign('service')->references('id')->on('services')->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
