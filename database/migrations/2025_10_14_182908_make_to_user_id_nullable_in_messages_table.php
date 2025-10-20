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
        Schema::table('messages', function (Blueprint $table) {
            // Make to_user_id nullable
            $table->unsignedBigInteger('to_user_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            // Revert to non-nullable (optional, adjust based on your needs)
            $table->unsignedBigInteger('to_user_id')->nullable(false)->change();
        });
    }
};
