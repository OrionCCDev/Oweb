<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class HomepageCacheObserver
{
    /**
     * Clear homepage cache when models are created, updated, or deleted
     */
    public function created($model)
    {
        $this->clearCache($model);
    }

    public function updated($model)
    {
        $this->clearCache($model);
    }

    public function deleted($model)
    {
        $this->clearCache($model);
    }

    /**
     * Clear relevant cache based on model type
     */
    protected function clearCache($model)
    {
        $modelClass = get_class($model);
        $cacheKeys = [];

        switch ($modelClass) {
            case 'App\Models\Sector':
                $cacheKeys[] = 'homepage.sectors';
                break;
            case 'App\Models\Event':
                $cacheKeys[] = 'homepage.events';
                $cacheKeys[] = 'homepage.main_event';
                break;
            case 'App\Models\Project':
                $cacheKeys[] = 'homepage.projects';
                break;
            case 'App\Models\Client':
                $cacheKeys[] = 'homepage.clients';
                break;
        }

        foreach ($cacheKeys as $key) {
            Cache::forget($key);
        }
    }
}
