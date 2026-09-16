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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unique(['country_id', 'name']);
            $table->string('name')->nullable();
            $table->string('Locode')->nullable();
            $table->json('port_types')->nullable();
            $table->integer('order_id')->nullable();
            $table->boolean('active')->default(1);
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
