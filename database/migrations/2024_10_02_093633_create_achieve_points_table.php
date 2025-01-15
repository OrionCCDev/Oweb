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
        Schema::create('achieve_points', function (Blueprint $table) {
            $table->id();
            $table->text('desc')->nullable();
            $table->foreignId('project_id')->nullable()->constrained(
                table: 'projects'
            )->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achieve_points');
    }
};
