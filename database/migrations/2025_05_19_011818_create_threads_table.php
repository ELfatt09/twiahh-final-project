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
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('threads')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('repost_id')->nullable()->constrained('threads')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('thread_medias', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->foreignId('thread_id')->constrained('threads')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
