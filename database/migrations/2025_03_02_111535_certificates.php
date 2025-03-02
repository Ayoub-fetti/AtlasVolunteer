<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Volunteer
            $table->foreignId('opportunity_id')->constrained()->onDelete('cascade');
            $table->string('certificate_number')->unique();
            $table->integer('hours_completed');
            $table->date('issue_date');
            $table->text('description')->nullable();
            $table->boolean('is_verified')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};