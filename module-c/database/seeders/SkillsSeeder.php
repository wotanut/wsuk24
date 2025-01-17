<?php

namespace Database\Seeders;

use App\Models\skills;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        skills::factory()->create([
            'name' => 'Cyber Security'
        ]);
        skills::factory()->create([
            'name' => 'IT Network Systems Administration'
        ]);
        skills::factory()->create([
            'name' => 'Web Technologies'
        ]);
    }
}
