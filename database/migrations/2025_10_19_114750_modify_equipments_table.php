<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropColumn('statut');
            $table->string('marque')->after('type');
            $table->string('image')->nullable()->after('marque');
            $table->string('etat')->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->string('statut')->default('disponible');
            $table->dropColumn(['marque', 'image', 'etat']);
        });
    }
};