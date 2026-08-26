<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Replaces the fixed Consultant / Category / Contract Type / Completion
     * / Duration rows on the project detail page with a fully admin-managed
     * label/value list - add, rename, reorder, or remove any row, per
     * project. Backfills one row per existing non-empty value so nothing
     * disappears from a project's page when this deploys.
     */
    public function up(): void
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('label');
            $table->string('value')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Project::with('sector')->chunkById(100, function ($projects) {
            foreach ($projects as $project) {
                $order = 0;
                $rows = [
                    'Consultant' => $project->consultant,
                    'Category' => $project->sector->name ?? null,
                    'Contract Type' => $project->contract_type,
                    'Completion' => $project->end ? Carbon::parse($project->end)->format('Y M') : null,
                    'Duration' => $project->duration,
                ];

                foreach ($rows as $label => $value) {
                    if (!empty($value)) {
                        $project->details()->create([
                            'label' => $label,
                            'value' => $value,
                            'sort_order' => $order,
                        ]);
                        $order += 10;
                    }
                }
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
