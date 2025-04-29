<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up()
{
    Schema::create('conversations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->foreignId('receiver_id')->constrained('users');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};