<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUsersSeeder extends Seeder
{
    /**
     * Interactively add additional dashboard accounts beyond the primary
     * super admin (which AdminUserSeeder handles). Prompts for each
     * account's details one at a time — nothing is hardcoded, nothing
     * ends up in a file. Skip entirely by answering "no" to the first
     * prompt, e.g. when running this non-interactively.
     */
    public function run(): void
    {
        if (! $this->command) {
            return;
        }

        if (! $this->command->confirm('Add an additional admin user now?', false)) {
            return;
        }

        do {
            $name = $this->command->ask('Name');
            $email = $this->command->ask('Email');

            if (! $name || ! $email) {
                $this->command->error('Name and email are required — skipping this entry.');
                continue;
            }

            $role = $this->command->choice('Role', ['admin', 'super_admin'], 0);

            $existing = User::where('email', $email)->first();

            if ($existing) {
                $existing->name = $name;
                $existing->role = $role;

                if ($this->command->confirm('This email already exists — also change its password?', false)) {
                    $password = $this->command->secret('New password (hidden)');
                    $confirm = $this->command->secret('Confirm password');

                    if (empty($password) || $password !== $confirm) {
                        $this->command->error('Passwords were empty or did not match — password left unchanged.');
                    } else {
                        $existing->password = Hash::make($password);
                    }
                }

                $existing->save();
                $this->command->info("Updated {$email} ({$role}).");
                continue;
            }

            $password = $this->command->secret('Password (hidden)');
            $confirm = $this->command->secret('Confirm password');

            if (empty($password) || $password !== $confirm) {
                $this->command->error('Passwords were empty or did not match — this account was not created.');
                continue;
            }

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
            ]);

            $this->command->info("Created {$email} ({$role}).");
        } while ($this->command->confirm('Add another admin?', false));
    }
}
