<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('participations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('challenge_id');
        $table->unsignedBigInteger('user_id');
        $table->string('comment')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();

        $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
