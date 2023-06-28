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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // Range absensi
            $table->string('attend_start');
            $table->string('attend_end');

            // Range Waktu absensi dimulai
            $table->string('time_start_deadline');
            $table->string('time_start_gap_deadline');

            // Range Waktu absensi berakhir
            $table->string('time_end_deadline');
            $table->string('time_end_gap_deadline');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
