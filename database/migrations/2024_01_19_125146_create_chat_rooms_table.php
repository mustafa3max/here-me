<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id_me')->require();
            $table->foreign('user_id_me')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
            $table->uuid('user_id_he')->require();
            $table->foreign('user_id_he')
                    ->on('users')
                    ->references('id')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_rooms');
    }
};
