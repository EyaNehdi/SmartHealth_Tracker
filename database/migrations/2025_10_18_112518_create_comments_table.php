<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('activities') && Schema::hasTable('users')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->text('comment');
                $table->integer('rating')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};

