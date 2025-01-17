<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permissions::factory()->create([
            'name' => 'Super'
        ]);
        Permissions::factory()->create([
            'name' => 'Admin'
        ]);
        Permissions::factory()->create([
            'name' => 'Guest'
        ]);
    }
}
