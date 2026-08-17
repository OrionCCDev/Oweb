@php
    $cardResolveMain = function ($proj) {
        $name = $proj->main_image ?: 'main.webp';
        $candidates = [$name];
        if ($name && !str_contains($name, '/')) {
            $candidates[] = $proj->slug_name . '/' . $name;
            $candidates[] = $proj->slug_name . '/gallery/' . $name;
        }
        foreach (array_unique($candidates) as $candidate) {
            if (Storage::disk('projects')->exists($candidate)) {
                return Storage::disk('projects')->url($candidate);
            }
        }
        return asset('orionFrontAssets/assets/images/project/' . $proj->slug_name . '/' . $name);
    };
    $cardMainUrl = $cardResolveMain($project);
    $cardIsDone = $project->status === 'completed';
    $cardDelay = (($index ?? 0) % 3) * 90;
@endphp
<article class="project-card project-card--reveal" style="--pc-delay: {{ $cardDelay }}ms">
    <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="project-card__link">
        <div class="project-card__media">
            <img src="{{ $cardMainUrl }}" alt="{{ $project->name }}" class="project-card__img" loading="lazy">
            <span class="project-card__status {{ $cardIsDone ? 'project-card__status--done' : 'project-card__status--progress' }}">
                @if ($cardIsDone)
                    <svg width="12" height="12" viewBox="0 0 16 16" fill="none"><path d="M3 8.5l3 3 7-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                @else
                    <svg width="12" height="12" viewBox="0 0 16 16" fill="none"><path d="M8 2v3M8 11v3M2 8h3M11 8h3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                @endif
                {{ $cardIsDone ? 'Completed' : 'In Progress' }}
            </span>
        </div>
        <div class="project-card__body">
            @if ($project->Sector)
                <span class="project-card__eyebrow">{{ $project->Sector->name }}</span>
            @endif
            <h3 class="project-card__title">{{ $project->name }}</h3>
            <span class="project-card__cta">
                View Project
                <span class="project-card__cta-arrow" aria-hidden="true">
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h11.5M8 1l4.5 4L8 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
            </span>
        </div>
    </a>
</article>
