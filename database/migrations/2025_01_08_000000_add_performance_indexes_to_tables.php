<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Check if an index exists on a table
     */
    private function indexExists($table, $indexName): bool
    {
        $indexes = DB::select("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$indexName]);
        return !empty($indexes);
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add indexes to projects table for better query performance
        if (!$this->indexExists('projects', 'idx_projects_priority')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->index('priority', 'idx_projects_priority');
            });
        }
        if (!$this->indexExists('projects', 'idx_projects_sector_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->index('sector_id', 'idx_projects_sector_id');
            });
        }
        if (!$this->indexExists('projects', 'idx_projects_client_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->index('client_id', 'idx_projects_client_id');
            });
        }
        if (!$this->indexExists('projects', 'idx_projects_slug_name')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->index('slug_name', 'idx_projects_slug_name');
            });
        }
        if (!$this->indexExists('projects', 'idx_projects_sector_id_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->index(['sector_id', 'id'], 'idx_projects_sector_id_id');
            });
        }

        // Add indexes to events table for better query performance
        if (!$this->indexExists('events', 'idx_events_created_at')) {
            Schema::table('events', function (Blueprint $table) {
                $table->index('created_at', 'idx_events_created_at');
            });
        }

        // Add indexes to clients table for better query performance
        if (!$this->indexExists('clients', 'idx_clients_logo')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->index('logo', 'idx_clients_logo');
            });
        }

        // Add indexes to project_gallaries table if it exists
        if (Schema::hasTable('project_gallaries') && !$this->indexExists('project_gallaries', 'idx_project_gallaries_project_id')) {
            Schema::table('project_gallaries', function (Blueprint $table) {
                $table->index('project_id', 'idx_project_gallaries_project_id');
            });
        }

        // Add indexes to project_points table if it exists
        if (Schema::hasTable('project_points') && !$this->indexExists('project_points', 'idx_project_points_project_id')) {
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
        if ($this->indexExists('projects', 'idx_projects_priority')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropIndex('idx_projects_priority');
            });
        }
        if ($this->indexExists('projects', 'idx_projects_sector_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropIndex('idx_projects_sector_id');
            });
        }
        if ($this->indexExists('projects', 'idx_projects_client_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropIndex('idx_projects_client_id');
            });
        }
        if ($this->indexExists('projects', 'idx_projects_slug_name')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropIndex('idx_projects_slug_name');
            });
        }
        if ($this->indexExists('projects', 'idx_projects_sector_id_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropIndex('idx_projects_sector_id_id');
            });
        }

        // Remove indexes from events table
        if ($this->indexExists('events', 'idx_events_created_at')) {
            Schema::table('events', function (Blueprint $table) {
                $table->dropIndex('idx_events_created_at');
            });
        }

        // Remove indexes from clients table
        if ($this->indexExists('clients', 'idx_clients_logo')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->dropIndex('idx_clients_logo');
            });
        }

        // Remove indexes from project_gallaries table if it exists
        if (Schema::hasTable('project_gallaries') && $this->indexExists('project_gallaries', 'idx_project_gallaries_project_id')) {
            Schema::table('project_gallaries', function (Blueprint $table) {
                $table->dropIndex('idx_project_gallaries_project_id');
            });
        }

        // Remove indexes from project_points table if it exists
        if (Schema::hasTable('project_points') && $this->indexExists('project_points', 'idx_project_points_project_id')) {
            Schema::table('project_points', function (Blueprint $table) {
                $table->dropIndex('idx_project_points_project_id');
            });
        }
    }
};
