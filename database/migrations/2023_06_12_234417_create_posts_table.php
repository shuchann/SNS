<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained();
            $table->string('title', 30);
            $table->string('image_url');
            $table->string('kyapusyon', 200);
            $table->string('hat', 50)->nullable();;
            $table->string('tops', 50)->nullable();;
            $table->string('pants', 50)->nullable();;
            $table->string('shoes', 50)->nullable();;
            $table->string('accessories', 50)->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};