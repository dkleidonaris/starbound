<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Option;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'd@d.com',
            'password' => Hash::make('123')
        ]);

        $this->call([
            SeasonSeeder::class,
            OptionSeeder::class,
            SupporterTypeSeeder::class,
            SupporterSeeder::class,
            TeamSeeder::class,
            DepartmentSeeder::class,
            TeamMemberSeeder::class,
            MilestoneSeeder::class,
            EventSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
