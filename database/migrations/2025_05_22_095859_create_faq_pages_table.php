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
        Schema::create('faq_pages', function (Blueprint $table) {
         $table->id();
        $table->string('heading');
        $table->text('paragraph');
        $table->string('contact_form_heading');
        $table->text('contact_form_paragraph');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_pages');
    }
};
