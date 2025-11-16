<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearHomePageCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-homepage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear homepage cache (sectors, events, projects, clients)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $keys = [
            'homepage.sectors',
            'homepage.events',
            'homepage.main_event',
            'homepage.projects',
            'homepage.clients',
        ];

        foreach ($keys as $key) {
            Cache::forget($key);
        }

        $this->info('Homepage cache cleared successfully!');
        $this->info('Cleared keys: ' . implode(', ', $keys));

        return 0;
    }
}
