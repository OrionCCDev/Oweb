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
     *
     * Safe to re-run: an existing account's password is never touched here
     * (only its role, in case it predates the role column) — only a
     * brand-new account gets a password set.
     */
    public function run(): void
    {
        $email = env('ADMIN_SEED_EMAIL', 'ahmed@orion.com');

        $existing = User::where('email', $email)->first();

        if ($existing) {
            $existing->role = 'super_admin';
            $existing->save();
            return;
        }

        $password = env('ADMIN_SEED_PASSWORD');
        $generated = false;

        if (! $password) {
            $password = Str::password(16);
            $generated = true;
        }

        User::create([
            'email' => $email,
            'name' => 'Ahmed Orion',
            'password' => $password,
            'role' => 'super_admin',
        ]);

        if ($generated && $this->command) {
            $this->command->warn("Generated admin password for {$email}: {$password}");
            $this->command->warn('Save this now — it will not be shown again. Set ADMIN_SEED_PASSWORD in .env to control it explicitly next time.');
        }
    }
}
