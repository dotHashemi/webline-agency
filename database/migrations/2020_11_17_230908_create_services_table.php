<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50)->unique();
            $table->string('description');
            $table->text('body')->nullable();
            $table->string('icon', 20);
            $table->string('slug')->unique();
            $table->text('tags');
            $table->smallInteger('order')->default(0);
        });
    }


    public function down()
    {
        Schema::dropIfExists('services');
    }
}
