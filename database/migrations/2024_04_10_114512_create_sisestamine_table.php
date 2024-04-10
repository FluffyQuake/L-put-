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
        Schema::create('sisestamine', function (Blueprint $table) {
            $table->id();
            $table->string('SN');
            $table->string('seade');
            $table->string('mudel');
            $table->string('kirjeldus');
            $table->string('seisukord');
            $table->string('riiul');
            $table->string('kauplus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
