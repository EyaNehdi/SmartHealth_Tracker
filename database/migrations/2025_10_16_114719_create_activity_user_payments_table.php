<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('activity_user_payments')) {
            Schema::create('activity_user_payments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('activity_id');
                $table->unsignedBigInteger('user_id');
                $table->string('session_id')->nullable();
                $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
                $table->unique(['activity_id', 'user_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_user_payments');
    }
};