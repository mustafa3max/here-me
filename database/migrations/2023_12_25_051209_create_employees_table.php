<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable(false);
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
            $table->string('title', 255)->require;
            $table->string('description', 5000);
            $table->string('banner')->nullable();
            $table->boolean('enabled')->default(true);
            $table->bigInteger('quality_score')->default(0);
            $table->json('sections')->default(json_encode([1]));
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
