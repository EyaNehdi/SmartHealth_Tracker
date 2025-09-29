<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
             $table->string('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
