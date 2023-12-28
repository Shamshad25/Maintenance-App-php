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
        // cannot be null error fix by nullable
        Schema::create('details_models', function (Blueprint $table) {
            $table->id();
            $table->string('RoomNumber');
            $table->string('PaidTo')->nullable();
            $table->string('PaidAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_models');
    }
};
