<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, update existing data to use new enum values
        DB::statement("UPDATE `projects` SET `status` = 'c-pro' WHERE `status` = 'completed'");
        DB::statement("UPDATE `projects` SET `status` = 'u-pro' WHERE `status` = 'in progress'");

        // Then change the status column to new enum values
        DB::statement("ALTER TABLE `projects` MODIFY COLUMN `status` ENUM('c-pro', 'u-con', 'u-pro', 'h-100') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE `projects` MODIFY COLUMN `status` ENUM('completed', 'in progress') NOT NULL");
    }
};
