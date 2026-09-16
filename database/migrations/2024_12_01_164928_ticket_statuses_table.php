<?php

use App\Enums\TicketStatus;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_statuses', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Ticket::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('status')->default(TicketStatus::PENDING->value);

            $table->foreignIdFor(User::class, 'updated_by_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignIdFor(User::class, 'transfer_to_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
                
            $table->integer('duration')->nullable();

            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_statuses');
    }
};
