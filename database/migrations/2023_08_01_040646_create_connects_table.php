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
        Schema::create('connects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diconnect')->references('id')->on('users')->ondelete('cascade')->onupdate('cascade');
            $table->string('kdState');
            $table->foreignId('user1')->references('id')->on('users')->ondelete('cascade')->onupdate('cascade');
            $table->foreignId('user2')->references('id')->on('users')->ondelete('cascade')->onupdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connects');
    }
};
