<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => [
                'en' => 'IEEE Day',
                'el' => 'IEEE Day',
            ],
            'location' => [
                'en' => 'Amphitheater 3, ECE Department, University of Thessaly',
                'el' => 'Αμφιθέατρο 3, Τμήμα ΗΜΜΥ, Πανεπιστήμιο Θεσσαλίας',
            ],
            'description' => [
                'en' => 'We can’t wait to share with our current and future projects with passionate individuals like you. Let’s discuss in an event for students by students.',
                'el' => 'Ανυπομονούμε να μοιραστούμε μαζί σας τα τρέχοντα και μελλοντικά μας έργα. Ας συζητήσουμε σε μια εκδήλωση για φοιτητές από φοιτητές.',
            ],
            'start_date' => '2025-11-01 11:00:00',
            'end_date' => '2025-11-01 15:00:00',
        ]);
    }
}
