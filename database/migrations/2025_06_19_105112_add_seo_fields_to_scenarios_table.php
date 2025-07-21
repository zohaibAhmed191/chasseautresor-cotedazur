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
        Schema::table('scenarios', function (Blueprint $table) {
             $table->string('meta_title_seo')->nullable()->after('title'); // Adjust position as needed
            $table->string('meta_description_seo', 500)->nullable()->after('meta_title_seo');
            $table->string('meta_keywords_seo')->nullable()->after('meta_description_seo');
            $table->string('image_alt_text')->nullable()->after('image'); // Assuming 'image' column exists
            $table->string('image_title_attr')->nullable()->after('image_alt_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scenarios', function (Blueprint $table) {
              $table->dropColumn([
                'meta_title_seo',
                'meta_description_seo',
                'meta_keywords_seo',
                'image_alt_text',
                'image_title_attr',
            ]); //
        });
    }
};
