<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Season::create([
            'name' => '2024-25',
            'year' => 2024,
        ]);

        Season::create([
            'name' => '2025-26',
            'year' => 2025,
        ]);
    }
}
