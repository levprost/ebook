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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('title'); 
            $table->text('sumary'); 
            $table->text('discription'); 
            $table->string('image')->nullable(); 
            $table->timestamps();

            $table->foreignId('category_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};