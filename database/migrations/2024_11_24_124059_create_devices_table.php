<?php

use App\Models\Company;
use App\Models\DeviceStatus;
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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable(); // Device type using Enum

            $table->string('serial_number')->nullable()->unique(); // Unique serial number
            $table->string('screen_size')->nullable(); // Screen size
            $table->enum('condition', ['new', 'used']); // new or used
            $table->boolean('active')->default(true); // Active means available for use otherwise it's a stock
            $table->text('note')->nullable(); // Extra note

            // Purchase Date and Warranty Information
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expire_date')->nullable();

            $table->foreignIdFor(DeviceStatus::class)->nullable()->constrained()->nullOnDelete(); // Current user
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete(); // Current user
            $table->foreignIdFor(Company::class)->nullable()->constrained()->nullOnDelete(); // Current company
            $table->foreignIdFor(User::class, 'created_by_user_id')->nullable()->constrained()->nullOnDelete(); // User who created the device
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
