<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('equipments')) {
            Schema::table('equipments', function (Blueprint $table) {
                if (Schema::hasColumn('equipments', 'statut')) {
                    $table->dropColumn('statut');
                }

                if (!Schema::hasColumn('equipments', 'marque')) {
                    $table->string('marque')->after('type');
                }

                if (!Schema::hasColumn('equipments', 'image')) {
                    $table->string('image')->nullable()->after('marque');
                }

                if (!Schema::hasColumn('equipments', 'etat')) {
                    $table->string('etat')->after('image');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('equipments')) {
            Schema::table('equipments', function (Blueprint $table) {
                if (!Schema::hasColumn('equipments', 'statut')) {
                    $table->string('statut')->default('disponible');
                }

                foreach (['marque', 'image', 'etat'] as $col) {
                    if (Schema::hasColumn('equipments', $col)) {
                        $table->dropColumn($col);
                    }
                }
            });
        }
    }
};
