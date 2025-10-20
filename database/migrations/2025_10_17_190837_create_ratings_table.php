<?php

// Nouvelle migration à créer : database/migrations/xxxx_xx_xx_create_activity_ratings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rating')->between(1, 5);
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['activity_id', 'user_id']); // Une évaluation par utilisateur par activité
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_ratings');
    }
};