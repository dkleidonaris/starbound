<?php

namespace Database\Seeders;

use App\Models\Milestone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Milestone::create([
            'title' => [
                'en' => 'Team Formation',
                'el' => 'Δημιουργία Ομάδας',
            ],
            'description' => [
                'en' => 'StarBound was founded by a group of Electrical & Computer Engineering students in Volos, with a passion for space exploration. It operates under the auspices of the University of Thessaly (UTH) and the IEEE SB of UTH.',
                'el' => 'Η StarBound ιδρύθηκε από μια ομάδα φοιτητών Ηλεκτρολόγων Μηχανικών & Μηχανικών Υπολογιστών στο Βόλο, με πάθος για την εξερεύνηση του διαστήματος. Λειτουργεί υπό την αιγίδα του Πανεπιστημίου Θεσσαλίας (ΠΘ) και του IEEE SB του ΠΘ.',
            ],
            'date' => '2024-04-01',
        ]);

        Milestone::create([
            'title' => [
                'en' => 'First Major Project',
                'el' => 'Πρώτο Μεγάλο Project',
            ],
            'description' => [
                'en' => 'In our first major project, we aim to develop a space unmanned aerial vehicle (UAV), with which we intend to compete in the UAS Challenge 2026 competition.',
                'el' => 'Στο πρώτο μας μεγάλο project, στοχεύουμε στη δημιουργία ενός διαστημικού μη επανδρωμένου αεροσκάφους (UAV), με το οποίο θέλουμε να συμμετάσχουμε στον διαγωνισμό UAS Challenge 2026.',
            ],
            'date' => '2024-11-01',
        ]);

        Milestone::create([
            'title' => [
                'en' => 'Forming Our First Interdisciplinary UAV Team',
                'el' => 'Δημιουργία της πρώτης μας διεπιστημονικής ομάδας UAV',
            ],
            'description' => [
                'en' => 'Our first official UAV team has been assembled, bringing together a diverse group of students and professors from multiple disciplines (ECE, Mechanical Engineering, Economics, etc.) to design and build a space-capable UAV.',
                'el' => 'Η πρώτη επίσημη ομάδα UAV μας συγκροτήθηκε με φοιτητές και καθηγητές από διάφορες σχολές (ΗΜΜΥ, Μηχανολόγων, Οικονομικών κ.ά.) για τον σχεδιασμό και την κατασκευή του UAV με διαστημικές εφαρμογές.',
            ],
            'date' => '2025-04-01',
        ]);

        Milestone::create([
            'title' => [
                'en' => 'Participation in UAS Challenge 2026',
                'el' => 'Συμμετοχή στο UAS Challenge 2026',
            ],
            'description' => [
                'en' => 'We are proud to announce our official participation in UAS Challenge 2026. Our team is developing an UAV than is able to execute precision water delivery missions.',
                'el' => 'Με υπερηφάνεια ανακοινώνουμε την επίσημη συμμετοχή μας στο UAS Challenge 2026. Η ομάδα μας αναπτύσσει ένα UAV, ικανό να εκτελεί αποστολές μεταφοράς νερού με μεγάλη ακρίβεια.',
            ],
            'date' => '2025-11-01',
        ]);
    }
}
