<?php

use App\Models\Device;
use App\Models\Mudel;
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
        Schema::create('sisestamine', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Device::class);
            // $table->foreignIdFor(Mudel::class);
            $table->string('SN');
            $table->string('device');
            $table->string('mudel');
            $table->text('description');
            $table->string('condition');
            $table->string('shelf');
            $table->string('shop');
            $table->string('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sisestamine');
    }
};
