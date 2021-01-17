<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->boolean('edible');
            $table->bigInteger('authorID')->unsigned();
            $table->foreign('authorID')->references('id')->on('users');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }

}
