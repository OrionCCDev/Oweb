<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The `status` column has been re-enum'd twice already (completed/in
     * progress -> c-pro/u-con/u-pro/h-100), and the app-level code
     * (admin forms, validation, the project card's status badge) has
     * drifted out of sync with whichever one is actually live on a given
     * database - a DB-level CHECK/ENUM constraint has to be changed in
     * lockstep with every place that reads or writes it, and it keeps
     * not happening. Dropping the constraint and normalizing everything
     * to one canonical pair of values (validated only at the Laravel
     * layer, same as every other status-like field in this app) ends
     * that drift for good rather than re-enum'ing a third time.
     */
    public function up(): void
    {
        Schema::table('projects', function ($table) {
            $table->string('status')->default('in_progress')->change();
        });

        // Normalize every legacy value (from either enum generation)
        // into the new canonical pair. Widen-then-normalize order matters
        // on MySQL: the column has to stop being an ENUM before it will
        // accept a value outside the old allowed list.
        Project::whereIn('status', ['completed', 'c-pro', 'h-100'])->update(['status' => 'completed']);
        Project::whereIn('status', ['in progress', 'u-con', 'u-pro'])->update(['status' => 'in_progress']);
    }

    public function down(): void
    {
        Project::where('status', 'completed')->update(['status' => 'c-pro']);
        Project::where('status', 'in_progress')->update(['status' => 'u-pro']);

        Schema::table('projects', function ($table) {
            $table->enum('status', ['c-pro', 'u-con', 'u-pro', 'h-100'])->default('u-pro')->change();
        });
    }
};
