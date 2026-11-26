<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class ModeratorSeeder extends Seeder
{
    public function run(): void
    {
        $moderatorRole = Role::where('name', 'moderator')->firstOrFail();

        User::updateOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Модератор',
                'password' => 'moderator123',
                'role_id' => $moderatorRole->id,
            ]
        );
    }
}
