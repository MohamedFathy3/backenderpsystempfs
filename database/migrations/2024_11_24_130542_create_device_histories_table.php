<?php

use App\Models\Device;
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
        Schema::create('device_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Device::class)->constrained()->cascadeOnDelete(); // Device ID

            $table->foreignIdFor(User::class, 'employee_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignIdFor(User::class, 'help_desk_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignIdFor(Ticket::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('action_type'); // assign, upgrade, downgrade, software, off-duty, windows

            $table->text('note')->nullable(); // extra note if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_histories');
    }
};
