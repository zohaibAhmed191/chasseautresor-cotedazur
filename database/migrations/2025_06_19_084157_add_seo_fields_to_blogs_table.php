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
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('image_alt_text')->nullable(); // Or after 'content' if no image_path yet
            $table->string('image_title_attr')->nullable();
            $table->string('meta_title_seo')->nullable(); // Assuming 'title' is an existing column
            $table->string('meta_description_seo', 500)->nullable(); // A bit longer for description
            $table->string('meta_keywords_seo')->nullable(); // Though less importan
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
};
