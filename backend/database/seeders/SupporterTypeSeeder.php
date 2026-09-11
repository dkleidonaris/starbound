<?php

namespace Database\Seeders;

use App\Models\SupporterType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupporterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupporterType::create([
            'slug' => 'galaxy',
            'name' => [
                'el' => 'Διαγαλαξιακοί',
                'en' => 'Galaxy'
            ],
            'order' => 1,
        ]);

        SupporterType::create([
            'slug' => 'gold',
            'name' => [
                'el' => 'Χρυσοί',
                'en' => 'Gold'
            ],
            'order' => 2
        ]);

        SupporterType::create([
            'slug' => 'silver',
            'name' => [
                'el' => 'Αργυροί',
                'en' => 'Silver'
            ],
            'order' => 3
        ]);

        SupporterType::create([
            'slug' => 'collaborators',
            'name' => [
                'el' => 'Συνεργάτες',
                'en' => 'Collaborators'
            ],
            'order' => 4
        ]);
    }
}
