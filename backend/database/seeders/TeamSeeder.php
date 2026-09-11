<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'slug' => 'professors',
            'name' => [
                'en' => 'Academic Council',
                'el' => 'Επιστημονικό Συμβούλιο',
            ],
            'order' => 1,
        ]);

        Team::create([
            'slug' => 'board',
            'name' => [
                'en' => 'Board',
                'el' => 'Διοικητικό Συμβούλιο',
            ],
            'order' => 2,
        ]);

        Team::create([
            'slug' => 'software',
            'name' => [
                'en' => 'Software & Embedded Systems',
                'el' => 'Λογισμικό & Ενσωματωμένα Συστήματα',
            ],
            'order' => 3,
        ]);

        Team::create([
            'slug' => 'electrical',
            'name' => [
                'en' => 'Electrical & Electronics',
                'el' => 'Ηλεκτρικά & Ηλεκτρονικά',
            ],
            'order' => 4,
        ]);

        Team::create([
            'slug' => 'mechanical',
            'name' => [
                'en' => 'Mechanical',
                'el' => 'Μηχανολογικά',
            ],
            'order' => 5,
        ]);

        Team::create([
            'slug' => 'structural',
            'name' => [
                'en' => 'Structural',
                'el' => 'Δομικά',
            ],
            'order' => 5,
        ]);

        Team::create([
            'slug' => 'aero',
            'name' => [
                'en' => 'Aerodynamics',
                'el' => 'Αεροδυναμική',
            ],
            'order' => 6,
        ]);

        Team::create([
            'slug' => 'kinematics',
            'name' => [
                'en' => 'Kinematics',
                'el' => 'Κινηματική',
            ],
            'order' => 7,
        ]);

        Team::create([
            'slug' => 'finance',
            'name' => [
                'en' => 'Finance',
                'el' => 'Οικονομικά',
            ],
            'order' => 8,
        ]);

        Team::create([
            'slug' => 'marketing',
            'name' => [
                'en' => 'Marketing & Activities',
                'el' => 'Μάρκετινγκ & Δραστηριότητες',
            ],
            'order' => 9,
        ]);

        Team::create([
            'slug' => 'business-marketing',
            'name' => [
                'en' => 'Business & Marketing',
                'el' => 'Επιχειρηματικών & Προώθησης',
            ],
            'order' => 9,
        ]);
    }
}
