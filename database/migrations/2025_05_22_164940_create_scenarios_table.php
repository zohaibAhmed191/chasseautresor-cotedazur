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
        Schema::create('scenarios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable(); // Store the path to the image
            $table->text('description')->nullable();
            $table->string('players')->nullable(); // e.g., "2-4 players"
            $table->string('age')->nullable();     // e.g., "12+"
            $table->string('location')->nullable(); // e.g., "Indoor"
            $table->string('duration')->nullable(); // e.g., "60 minutes"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scenarios');
    }
};
