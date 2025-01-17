<?php

namespace Database\Seeders;

use App\Models\competitors;
use Illuminate\Database\Seeder;

class CompetitorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competitors::factory()->count(10)->create();
    }
}
