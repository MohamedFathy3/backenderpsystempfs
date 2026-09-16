<?php

use App\Enums\TicketPriority;
use App\Models\Type;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name')->nullable();
            $table->time('time')->nullable();
            $table->enum('priority', ['Low', 'Medium', 'High', 'Critical'])->nullable();
            $table->text('short_description')->nullable();
            $table->foreignIdFor(Type::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
