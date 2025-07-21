<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('concours', function (Blueprint $table) {
            $table->id();
            $table->string('main_heading');
            $table->text('main_paragraph');
            $table->text('sub_paragraph')->nullable();
            $table->string('how_to_play_heading');
            $table->string('subheading1')->nullable();
            $table->text('subparagraph1')->nullable();
            $table->string('subheading2')->nullable();
            $table->text('subparagraph2')->nullable();
            $table->string('subheading3')->nullable();
            $table->text('subparagraph3')->nullable();
            $table->string('asking_question');
            $table->json('asking_lines')->nullable(); // Array of text lines
            $table->json('endlines')->nullable(); // Array of text lines
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('concours');
    }
};