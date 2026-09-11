<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'slug' => 'el-eng',
            'name' => [
                'en' => 'Electrical & Computer Engineering Department',
                'el' => 'Τμήμα Ηλεκτρολόγων Μηχανικών & Μηχανικών Υπολογιστών',
            ],
        ]);

        Department::create([
            'slug' => 'mech-eng',
            'name' => [
                'en' => 'Mechanical Engineering Department',
                'el' => 'Τμήμα Μηχανολόγων Μηχανικών',
            ],
        ]);

        Department::create([
            'slug' => 'info-tech',
            'name' => [
                'en' => 'Informatics & Telecommunications Department',
                'el' => 'Τμήμα Πληροφορικής & Τηλεπικοινωνιών',
            ],
        ]);

        Department::create([
            'slug' => 'eco',
            'name' => [
                'en' => 'Economics Department',
                'el' => 'Τμήμα Οικονομικών',
            ],
        ]);

        Department::create([
            'slug' => 'bus-admin',
            'name' => [
                'en' => 'Business Administration Department',
                'el' => 'Τμήμα Διοίκησης Επιχειρήσεων',
            ],
        ]);

        Department::create([
            'slug' => 'civil-eng',
            'name' => [
                'en' => 'Civil Engineering Department',
                'el' => 'Τμήμα Πολιτικών Μηχανικών',
            ],
        ]);

        Department::create([
            'slug' => 'bio-tech',
            'name' => [
                'en' => 'Biochemistry & Biotechnology Department',
                'el' => 'Τμήμα Βιοχημείας & Βιοτεχνολογίας',
            ],
        ]);

        Department::create([
            'slug' => 'primary-edu',
            'name' => [
                'en' => 'Early Childhood Education Department',
                'el' => 'Τμήμα Προσχολικής Εκπαίδευσης',
            ],
        ]);

        Department::create([
            'slug' => 'dig-sys',
            'name' => [
                'en' => 'Digital Systems Department',
                'el' => 'Τμήμα Ψηφιακών Συστημάτων',
            ],
        ]); 
    }
}
