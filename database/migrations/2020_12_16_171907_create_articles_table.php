<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user');
            $table->string('access', 10)->default("normal");
            $table->string('type', 10)->default("text");
            $table->string('title', 100);
            $table->string('thumbnail');
            $table->string('pdf')->nullable();
            $table->string('voice')->nullable();
            $table->text('description')->nullable();
            $table->text('body');
            $table->text('tags');
            $table->string('slug')->unique();
            $table->boolean('status')->default(true);
            $table->integer('time')->default(0);
            $table->integer('view')->default(0);
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->useCurrent();

            $table->foreign('user')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });


        Schema::create('article_category', function (Blueprint $table) {
            $table->unsignedBigInteger('article');
            $table->unsignedBigInteger('category');

            $table->primary(['article', 'category']);
            $table->foreign('article')->references('id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
