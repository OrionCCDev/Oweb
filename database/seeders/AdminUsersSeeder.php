<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUsersSeeder extends Seeder
{
    /**
     * Seeds additional dashboard accounts beyond the primary super admin
     * (which AdminUserSeeder handles). Edit the list below with real team
     * members before running — no passwords are stored here; each account
     * gets a random password generated on creation and printed once to the
     * console. Existing accounts (matched by email) are left untouched,
     * including their password, so this is safe to re-run after adding
     * a new entry to the list.
     */
    private const ADMINS = [
        // ['name' => 'Jane Doe', 'email' => 'jane@orioncc.com', 'role' => 'admin'],
    ];

    public function run(): void
    {
        if (empty(self::ADMINS)) {
            if ($this->command) {
                $this->command->info('AdminUsersSeeder: no additional admins configured — edit database/seeders/AdminUsersSeeder.php to add some.');
            }
            return;
        }

        foreach (self::ADMINS as $admin) {
            if (User::where('email', $admin['email'])->exists()) {
                continue;
            }

            $password = Str::password(16);

            User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => $password,
                'role' => $admin['role'] ?? 'admin',
            ]);

            if ($this->command) {
                $this->command->warn("Created {$admin['email']} ({$admin['role']}) — password: {$password}");
                $this->command->warn('Save this now — it will not be shown again.');
            }
        }
    }
}
