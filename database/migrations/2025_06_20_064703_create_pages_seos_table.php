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
        Schema::create('pages_seos', function (Blueprint $table) {
            $table->id();
            $table->string('home_meta_title')->nullable();
            $table->text('home_meta_description')->nullable();
            $table->string('home_meta_keywords')->nullable();

            $table->string('faq_meta_title')->nullable();
            $table->text('faq_meta_description')->nullable();
            $table->string('faq_meta_keywords')->nullable();

            $table->string('concour_meta_title')->nullable();
            $table->text('concour_meta_description')->nullable();
            $table->string('concour_meta_keywords')->nullable();

            $table->string('mysteria_meta_title')->nullable();
            $table->text('mysteria_meta_description')->nullable();
            $table->string('mysteria_meta_keywords')->nullable();

            $table->string('aprops_meta_title')->nullable();
            $table->text('aprops_meta_description')->nullable();
            $table->string('aprops_meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_seos');
    }
};