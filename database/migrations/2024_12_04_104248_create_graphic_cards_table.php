<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('graphic_cards', function (Blueprint $table) {
            $table->id();
            $table->string('model')->nullable();
            $table->string('vram')->nullable();
            $table->string('code')->unique()->nullable();
            $table->unique(['model', 'vram']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graphic_cards');
    }
};
