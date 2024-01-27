<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('poster', 255);
            $table->string('title', 60);
            $table->string('description', 150);
            $table->string('summary', 255);
            $table->boolean('enabled')->default(true);
            $table->json('sections');
            $table->bigInteger('quality_score')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('summaries');
    }
};
