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
        Schema::create('attendance_user', function (Blueprint $table) {
            $table->id();
            $table->timestamp('present_in')->nullable();
            $table->string('image_in')->nullable();
            $table->timestamp('present_out')->nullable();
            $table->string('image_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_user');
    }
};
