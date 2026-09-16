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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('local_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('alias_name')->nullable();
            $table->string('branche_type')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('active')->default(false);


            $table->foreignId('city_id')->nullable(); // ← تم تعديلها هنا
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();

            $table->foreignId('country_id')->nullable(); // ← تم تعديلها هنا
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();

            $table->foreignId('phone_key_id')->nullable(); // ← تم تعديلها هنا
            $table->foreign('phone_key_id')->references('id')->on('countries')->cascadeOnDelete();

            $table->foreignIdFor(App\Models\Company::class)->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
