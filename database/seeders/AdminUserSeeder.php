<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's administrator user.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'ahmed@orion.com'],
            [
                'name' => 'Ahmed Orion',
                'password' => '@Rion@2025',
            ]
        );
    }
}

