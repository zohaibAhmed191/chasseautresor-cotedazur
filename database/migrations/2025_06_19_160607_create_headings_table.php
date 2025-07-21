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
        Schema::create('headings', function (Blueprint $table) {
            $table->id();
             $table->string('home')->nullable();
        $table->string('concours')->nullable();
        $table->string('scenario')->nullable();
        $table->string('faq')->nullable();
        $table->string('blog')->nullable();
        $table->string('aprops')->nullable();
        $table->string('mysteria')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headings');
    }
};
