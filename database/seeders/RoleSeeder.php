<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $moderator = Role::firstOrCreate([
            'name' => 'moderator',
        ]);

        $reader = Role::firstOrCreate([
            'name' => 'reader',
        ]);

        User::whereNull('role_id')->update([
            'role_id' => $reader->id,
        ]);
    }
}
