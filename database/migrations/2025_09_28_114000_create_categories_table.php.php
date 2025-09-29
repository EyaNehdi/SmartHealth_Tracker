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
        
        Schema::create('categories', function (Blueprint $table) {
           $table->id(); 
            $table->string('nom'); 
            $table->text('description')->nullable(); 
            $table->timestamps(); 
            $table->string('statut')->default('disponible');
            $table->timestamp('date_creation')->useCurrent(); 

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
