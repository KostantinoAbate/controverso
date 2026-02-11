<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = config('init.roles');
        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
                'label' => $role['label'] ?? null,
            ]);
        }
    }
}
