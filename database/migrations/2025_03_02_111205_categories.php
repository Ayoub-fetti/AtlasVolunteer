<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
        
        // Pivot table for opportunities and categories (many-to-many)
        Schema::create('category_opportunity', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('opportunity_id')->constrained()->onDelete('cascade');
            $table->primary(['category_id', 'opportunity_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_opportunity');
        Schema::dropIfExists('categories');
    }
};