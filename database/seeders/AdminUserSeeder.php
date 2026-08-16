<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's primary super admin.
     *
     * Interactive by default — prompts for email/name/password when run
     * from a terminal, so real credentials are typed in and never live in
     * a file. ADMIN_SEED_EMAIL / ADMIN_SEED_PASSWORD in .env still work as
     * a non-interactive override (e.g. for automated setups).
     *
     * Safe to re-run: an existing account's password is never touched
     * here (only its role, in case it predates the role column) —
     * only a brand-new account gets a password set.
     */
    public function run(): void
    {
        $email = env('ADMIN_SEED_EMAIL');
        $name = env('ADMIN_SEED_NAME');
        $password = env('ADMIN_SEED_PASSWORD');

        if (! $email && $this->command) {
            $this->command->info('Set up the primary super admin account.');
            $email = $this->command->ask('Email');
            $name = $this->command->ask('Name', 'Admin');
        }

        $email = $email ?: 'ahmed@orion.com';
        $name = $name ?: 'Admin';

        $existing = User::where('email', $email)->first();

        if ($existing) {
            $existing->role = 'super_admin';
            $existing->save();

            if ($this->command) {
                $this->command->info("{$email} already existed — role set to super_admin, password left untouched.");
            }
            return;
        }

        if (! $password && $this->command) {
            $password = $this->command->secret('Password (hidden)');
            $confirm = $this->command->secret('Confirm password');

            if (empty($password) || $password !== $confirm) {
                $this->command->error('Passwords were empty or did not match — aborting. Re-run the seeder to try again.');
                return;
            }
        }

        $generated = false;
        if (! $password) {
            $password = Str::password(16);
            $generated = true;
        }

        User::create([
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'role' => 'super_admin',
        ]);

        if ($generated && $this->command) {
            $this->command->warn("Generated password for {$email}: {$password}");
            $this->command->warn('Save this now — it will not be shown again.');
        } elseif ($this->command) {
            $this->command->info("Created super admin {$email}.");
        }
    }
}
