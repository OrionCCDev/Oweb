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
        // Add indexes to projects table for better query performance
        Schema::table('projects', function (Blueprint $table) {
            $table->index('priority', 'idx_projects_priority');
            $table->index('sector_id', 'idx_projects_sector_id');
            $table->index('client_id', 'idx_projects_client_id');
            $table->index('slug_name', 'idx_projects_slug_name');
            $table->index(['sector_id', 'id'], 'idx_projects_sector_id_id');
        });

        // Add indexes to events table for better query performance
        Schema::table('events', function (Blueprint $table) {
            $table->index('created_at', 'idx_events_created_at');
            $table->index('date', 'idx_events_date');
        });

        // Add indexes to clients table for better query performance
        Schema::table('clients', function (Blueprint $table) {
            $table->index('logo', 'idx_clients_logo');
        });

        // Add indexes to sectors table for better query performance
        Schema::table('sectors', function (Blueprint $table) {
            $table->index('slug_name', 'idx_sectors_slug_name');
        });

        // Add indexes to project_gallaries table if it exists
        if (Schema::hasTable('project_gallaries')) {
            Schema::table('project_gallaries', function (Blueprint $table) {
                $table->index('project_id', 'idx_project_gallaries_project_id');
            });
        }

        // Add indexes to project_points table if it exists
        if (Schema::hasTable('project_points')) {
            Schema::table('project_points', function (Blueprint $table) {
                $table->index('project_id', 'idx_project_points_project_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove indexes from projects table
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('idx_projects_priority');
            $table->dropIndex('idx_projects_sector_id');
            $table->dropIndex('idx_projects_client_id');
            $table->dropIndex('idx_projects_slug_name');
            $table->dropIndex('idx_projects_sector_id_id');
        });

        // Remove indexes from events table
        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex('idx_events_created_at');
            $table->dropIndex('idx_events_date');
        });

        // Remove indexes from clients table
        Schema::table('clients', function (Blueprint $table) {
            $table->dropIndex('idx_clients_logo');
        });

        // Remove indexes from sectors table
        Schema::table('sectors', function (Blueprint $table) {
            $table->dropIndex('idx_sectors_slug_name');
        });

        // Remove indexes from project_gallaries table if it exists
        if (Schema::hasTable('project_gallaries')) {
            Schema::table('project_gallaries', function (Blueprint $table) {
                $table->dropIndex('idx_project_gallaries_project_id');
            });
        }

        // Remove indexes from project_points table if it exists
        if (Schema::hasTable('project_points')) {
            Schema::table('project_points', function (Blueprint $table) {
                $table->dropIndex('idx_project_points_project_id');
            });
        }
    }
};
