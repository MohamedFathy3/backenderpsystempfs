<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('type_id')->nullable()->after('category_id')->constrained('types')->nullOnDelete();
            $table->index(['type_id', 'status', 'priority']);
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropIndex(['type_id', 'status', 'priority']);
            $table->dropColumn('type_id');
        });
    }
};
