<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('device_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Specific model (e.g., XPS 13, HP Elitebook)
            $table->string('code')->unique()->nullable();
            $table->foreignIdFor(Brand::class)->nullable()->constrained()->cascadeOnDelete();
            $table->unique(['brand_id', 'name']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_models');
    }
};
