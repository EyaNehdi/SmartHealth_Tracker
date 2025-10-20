<?php

// Migration pour recréer la table activity_user_likes si supprimée
// Exécutez : php artisan make:migration recreate_activity_user_likes_table --create=activity_user_likes
// Puis remplacez le contenu par ceci et php artisan migrate

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('activity_user_likes')) {
            Schema::create('activity_user_likes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('activity_id');
                $table->unsignedBigInteger('user_id');
                $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
                $table->unique(['activity_id', 'user_id']);
            });
        }

        // Assurer que la colonne likes existe dans activities
        if (!Schema::hasColumn('activities', 'likes')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->integer('likes')->default(0)->after('avis');
            });
        } else {
            Schema::table('activities', function (Blueprint $table) {
                $table->integer('likes')->default(0)->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_user_likes');
        if (Schema::hasColumn('activities', 'likes')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->dropColumn('likes');
            });
        }
    }
};