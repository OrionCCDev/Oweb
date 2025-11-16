<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Only run if the projects table exists
        if (Schema::hasTable('projects')) {
            // Step 1: Temporarily change to VARCHAR to allow any value
            DB::statement("ALTER TABLE `projects` MODIFY COLUMN `status` VARCHAR(255) NOT NULL");

            // Step 2: Update existing data to new values
            DB::statement("UPDATE `projects` SET `status` = 'c-pro' WHERE `status` = 'completed'");
            DB::statement("UPDATE `projects` SET `status` = 'u-pro' WHERE `status` = 'in progress'");

            // Step 3: Change to new ENUM values
            DB::statement("ALTER TABLE `projects` MODIFY COLUMN `status` ENUM('c-pro', 'u-con', 'u-pro', 'h-100') NOT NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('projects')) {
            // Revert back to original enum values
            DB::statement("ALTER TABLE `projects` MODIFY COLUMN `status` ENUM('completed', 'in progress') NOT NULL");
        }
    }
};
