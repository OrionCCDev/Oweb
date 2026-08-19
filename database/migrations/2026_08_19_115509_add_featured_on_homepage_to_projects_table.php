<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('featured_on_homepage')->default(false)->after('priority');
            $table->unsignedInteger('homepage_sort_order')->default(0)->after('featured_on_homepage');
        });

        // Preserve whatever is live right now: mark exactly the projects
        // currently shown on the homepage (the old mechanism - top 9 by
        // the priority column) as featured, in their current order, so
        // deploying this migration doesn't change the live homepage until
        // an admin actively uses the new picker.
        $current = Project::orderBy('priority')->take(9)->get(['id']);
        foreach ($current as $index => $project) {
            $project->update([
                'featured_on_homepage' => true,
                'homepage_sort_order' => ($index + 1) * 10,
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['featured_on_homepage', 'homepage_sort_order']);
        });
    }
};
