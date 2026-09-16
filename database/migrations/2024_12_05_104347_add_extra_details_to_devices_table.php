<?php

use App\Models\Brand;
use App\Models\DeviceModel;
use App\Models\GraphicCard;
use App\Models\Memory;
use App\Models\Processor;
use App\Models\Storage as HDStorage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->foreignIdFor(Memory::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(GraphicCard::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Processor::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Brand::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(DeviceModel::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropForeign(['memory_id']);
            $table->dropColumn('memory_id');

            $table->dropForeign(['storage_id']);
            $table->dropColumn('storage_id');

            $table->dropForeign(['graphic_card_id']);
            $table->dropColumn('graphic_card_id');

            $table->dropForeign(['processor_id']);
            $table->dropColumn('processor_id');

            $table->dropForeign(['brand_id']);
            $table->dropColumn('brand_id');

            $table->dropForeign(['device_model_id']);
            $table->dropColumn('device_model_id');
        });
    }
};
