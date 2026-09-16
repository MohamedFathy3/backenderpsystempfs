<?php

use App\Models\Organization;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('code')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('type')->default(App\Enums\CompanyType::BRANCH->value)->nullable();

            $table->string('avatar')->nullable();
            $table->string('company_type')->nullable();
            $table->foreignIdFor(Organization::class)->nullable()->constrained()->nullOnDelete();

            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete();
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnDelete();


            $table->string('phone')->nullable();

            $table->foreignId('phone_key_id')->nullable(); // ← تم تعديلها هنا
            $table->foreign('phone_key_id')->references('id')->on('countries')->cascadeOnDelete();



            $table->softDeletes();
            $table->timestamps();

            // Composite unique constraint to ensure code + city_id is unique
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
