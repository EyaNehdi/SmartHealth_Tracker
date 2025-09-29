   <?php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       public function up(): void
       {
           Schema::create('activities', function (Blueprint $table) {
               $table->id();
               $table->string('nom');
               $table->text('description')->nullable();
               $table->dateTime('date');
               $table->integer('duree')->nullable();
               $table->unsignedBigInteger('user_id');
               $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
               $table->timestamps();
           });
       }

       public function down(): void
       {
           Schema::dropIfExists('activities');
       }
   };
   