<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFamousToChallengesTable extends Migration
{
    public function up()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->boolean('is_famous')->default(false);
        });
    }

    public function down()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->dropColumn('is_famous');
        });
    }
}
