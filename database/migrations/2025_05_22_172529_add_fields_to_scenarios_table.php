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
            $table->string('heading')->nullable()->after('duration'); // Short heading
            $table->text('paragraph')->nullable()->after('heading');  // Longer text content
            $table->string('video_url')->nullable()->after('paragraph'); // URL to a video
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scenarios', function (Blueprint $table) {
            //
        });
    }
};
