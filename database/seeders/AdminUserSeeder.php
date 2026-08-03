<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's administrator user.
     *
     * Set ADMIN_SEED_EMAIL / ADMIN_SEED_PASSWORD in .env to control the
     * credentials explicitly. If ADMIN_SEED_PASSWORD is not set, a random
     * password is generated and printed once to the console.
     */
    public function run(): void
    {
        $email = env('ADMIN_SEED_EMAIL', 'ahmed@orion.com');
        $password = env('ADMIN_SEED_PASSWORD');
        $generated = false;

        if (! $password) {
            $password = Str::password(16);
            $generated = true;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Ahmed Orion',
                'password' => $password,
            ]
        );

        if ($generated && $this->command) {
            $this->command->warn("Generated admin password for {$email}: {$password}");
            $this->command->warn('Save this now — it will not be shown again. Set ADMIN_SEED_PASSWORD in .env to control it explicitly next time.');
        }
    }
}
