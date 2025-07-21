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
        Schema::create('footer_texts', function (Blueprint $table) {
            $table->id();
               $table->longText('home')->nullable();
            $table->longText('aprops')->nullable();
            $table->longText('scenario')->nullable();
            $table->longText('blogs')->nullable();
            $table->longText('faqs')->nullable();
            $table->longText('concours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_texts');
    }
};
