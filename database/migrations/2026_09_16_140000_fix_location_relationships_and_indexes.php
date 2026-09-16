<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['phone_key_id']);
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('phone_key_id')->references('id')->on('countries')->nullOnDelete();
            $table->index(['country_id', 'city_id']);
        });

        Schema::table('branches', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['phone_key_id']);
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('phone_key_id')->references('id')->on('countries')->nullOnDelete();
            $table->index(['company_id', 'country_id', 'city_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['phone_key_id']);
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('branch_id')->references('id')->on('branches')->nullOnDelete();
            $table->foreign('phone_key_id')->references('id')->on('countries')->nullOnDelete();
            $table->index(['branch_id', 'country_id', 'city_id']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['phone_key_id']);
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->foreign('branch_id')->references('id')->on('branches')->cascadeOnDelete();
            $table->foreign('phone_key_id')->references('id')->on('countries')->cascadeOnDelete();
        });
        Schema::table('branches', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['phone_key_id']);
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->foreign('phone_key_id')->references('id')->on('countries')->cascadeOnDelete();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['phone_key_id']);
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->foreign('phone_key_id')->references('id')->on('countries')->cascadeOnDelete();
        });
    }
};
