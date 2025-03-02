<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });
        
        Schema::create('skill_user', function (Blueprint $table) {
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->primary(['skill_id', 'user_id']);
        });
        
        Schema::create('opportunity_skill', function (Blueprint $table) {
            $table->foreignId('opportunity_id')->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->primary(['opportunity_id', 'skill_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunity_skill');
        Schema::dropIfExists('skill_user');
        Schema::dropIfExists('skills');
    }
};