<?php

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Models\Category;
use App\Models\Device;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('category')->nullable(); // Add (Hardware, OS, Apps, Internet, electrical issue)
            $table->timestamp('open_at')->nullable();
            $table->timestamp('close_at')->nullable();
            $table->text('postpone_note')->nullable();
            $table->string('status')->default(TicketStatus::PENDING->value);

            // Foreign key for the employee who created the ticket
            $table->foreignIdFor(User::class, 'employee_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Foreign key for the help desk person assigned to the ticket
            $table->foreignIdFor(User::class, 'help_desk_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Foreign key for the created who created the ticket
            $table->foreignIdFor(User::class, 'created_by_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

            // Foreign key for the device linked to the ticket (if any)
            $table->foreignIdFor(Device::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('priority')->default(TicketPriority::MEDIUM->value)->nullable();
            $table->integer('rating')
                ->nullable();

            $table->integer('ata_time')->default(30);
            $table->integer('daily_time')->nullable();
            $table->boolean('daily_status')->default(false);
            $table->string('avatar')->nullable();
            $table->string('des')->nullable();

            $table->foreignIdFor(Category::class)
            ->nullable()
            ->constrained()
            ->nullOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
