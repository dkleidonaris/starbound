<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Season;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamMemberAssignment;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seasonIds = Season::query()
            ->whereIn('name', ['2024-25', '2025-26'])
            ->pluck('id', 'name');

        $departmentIds = Department::query()
            ->whereIn('slug', [
                'civil-eng',
                'dig-sys',
                'eco',
                'el-eng',
                'info-tech',
                'mech-eng',
                'primary-edu',
                'bus-admin',
            ])
            ->pluck('id', 'slug');

        $teamIds = Team::query()
            ->whereIn('slug', [
                'professors',
                'board',
                'software',
                'electrical',
                'mechanical',
                'structural',
                'aero',
                'kinematics',
                'finance',
                'marketing',
                'business-marketing',
            ])->pluck('id', 'slug');

        $assign = fn(string $season, string $team, string $roleEn, string $roleEl, int $order) => [
            'season' => $season,
            'team' => $team,
            'role' => ['en' => $roleEn, 'el' => $roleEl],
            'order' => $order,
        ];

        $member = fn(array $data, array $assignments) => [
            'data' => $data,
            'assignments' => $assignments,
        ];

        $members = [
            // Professors
            $member([
                'first_name' => ['en' => 'Fotios', 'el' => 'Φώτιος'],
                'last_name' => ['en' => 'Plessas', 'el' => 'Πλέσσας'],
                'linkedin' => 'https://www.linkedin.com/in/fotisplessas/',
                'github' => null,
                'email' => 'fplessas@uth.gr',
                'photo' => 'Fotios Plessas.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'professors', 'Professor', 'Καθηγητής', 1),
                $assign('2025-26', 'professors', 'Professor', 'Καθηγητής', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Dimitrios', 'el' => 'Δημήτριος'],
                'last_name' => ['en' => 'Karamperopoulos', 'el' => 'Καραμπερόπουλος'],
                'linkedin' => 'https://www.linkedin.com/in/dimitris-karaberopoulos-28848191/',
                'github' => null,
                'email' => 'dkarabero@uth.gr',
                'photo' => 'Dimitrios Karamperopoulos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'professors', 'LTS', 'Ε.ΔΙ.Π', 2),
                $assign('2025-26', 'professors', 'LTS', 'Ε.ΔΙ.Π', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Loukas', 'el' => 'Λουκάς'],
                'last_name' => ['en' => 'Zacheilas', 'el' => 'Ζαχείλας'],
                'linkedin' => 'https://www.linkedin.com/in/loukas-zachilas-447a7222/',
                'github' => null,
                'email' => 'zacheilas@econ.uth.gr',
                'photo' => 'Loukas Zacheilas.png',
                'department_id' => $departmentIds['eco'],
            ], [
                $assign('2024-25', 'professors', 'Professor', 'Καθηγητής', 2),
                $assign('2025-26', 'professors', 'Professor', 'Καθηγητής', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Maria', 'el' => 'Μαρία'],
                'last_name' => ['en' => 'Kontaxi', 'el' => 'Κονταξή'],
                'linkedin' => null,
                'github' => null,
                'email' => 'kontaxi@uth.gr',
                'photo' => 'Maria Kontaxi.png',
                'department_id' => $departmentIds['eco'],
            ], [
                $assign('2024-25', 'professors', 'LTS', 'Ε.ΔΙ.Π', 2),
                $assign('2025-26', 'professors', 'LTS', 'Ε.ΔΙ.Π', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Georgios', 'el' => 'Γεώργιος'],
                'last_name' => ['en' => 'Floros', 'el' => 'Φλώρος'],
                'linkedin' => 'https://www.linkedin.com/in/george-floros-79205073',
                'github' => null,
                'email' => 'florosg@tcd.ie',
                'photo' => 'Georgios Floros.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'professors', 'Academic Staff', 'Ακαδημαϊκός Διδάσκων', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Konstantinos', 'el' => 'Κωνσταντίνος'],
                'last_name' => ['en' => 'Kolomvatsos', 'el' => 'Κολομβάτσος'],
                'linkedin' => 'https://www.linkedin.com/in/kostas-kolomvatsos-21357a222',
                'github' => null,
                'email' => 'kostasks@uth.gr',
                'photo' => 'Konstantinos Kolomvatsos.png',
                'department_id' => $departmentIds['info-tech'],
            ], [
                $assign('2024-25', 'professors', 'Associate Professor', 'Αναπληρωτής Καθηγητής', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Spyros', 'el' => 'Σπύρος'],
                'last_name' => ['en' => 'Lalis', 'el' => 'Λάλης'],
                'linkedin' => 'https://www.linkedin.com/in/spyros-lalis-a979a416/',
                'github' => null,
                'email' => 'lalis@uth.gr',
                'photo' => 'Spyros Lalis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'professors', 'Professor', 'Καθηγητής', 2),
                $assign('2025-26', 'professors', 'Professor', 'Καθηγητής', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Emmanouil', 'el' => 'Εμμανουήλ'],
                'last_name' => ['en' => 'Koutsoubelias', 'el' => 'Κουτσουμπέλιας'],
                'linkedin' => null,
                'github' => null,
                'email' => 'emkouts@gmail.com',
                'photo' => 'Emmanouil Koutsoubelias.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'professors', 'Academic Staff', 'Ακαδημαϊκός Διδάσκων', 2),
                $assign('2025-26', 'professors', 'Academic Staff', 'Ακαδημαϊκός Διδάσκων', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Apostolos', 'el' => 'Απόστολος'],
                'last_name' => ['en' => 'Xenakis', 'el' => 'Ξενάκης'],
                'linkedin' => 'https://www.linkedin.com/in/apostolos-xenakis-75745b34/',
                'github' => null,
                'email' => 'axenakis@uth.gr',
                'photo' => 'Apostolos Xenakis.png',
                'department_id' => $departmentIds['dig-sys'],
            ], [
                $assign('2025-26', 'professors', 'Professor', 'Καθηγητής', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Konstantinos', 'el' => 'Κωνσταντίνος'],
                'last_name' => ['en' => 'Ampountolas', 'el' => 'Αμπουντώλας'],
                'linkedin' => null,
                'github' => null,
                'email' => 'k.ampountolas@uth.gr',
                'photo' => 'Konstantinos Ampountolas.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'professors', 'Professor', 'Καθηγητής', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Konstantinos', 'el' => 'Κωνσταντίνος'],
                'last_name' => ['en' => 'Ritos', 'el' => 'Ρήτος'],
                'linkedin' => null,
                'github' => null,
                'email' => 'konritos@uth.gr',
                'photo' => 'Konstantinos Ritos.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'professors', 'Assistant Professor', 'Επίκουρος Καθηγητής', 2),
            ]),

            // Board
            $member([
                'first_name' => ['en' => 'Charalampos', 'el' => 'Χαράλαμπος'],
                'last_name' => ['en' => 'Zachariadis', 'el' => 'Ζαχαριάδης'],
                'linkedin' => 'https://www.linkedin.com/in/zachariadis-charis/',
                'github' => 'https://github.com/czachariadis',
                'email' => 'zachariadis.charis@gmail.com',
                'photo' => 'Zachariadis_Charis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'board', 'Team Lead', 'Επικεφαλής Ομάδας', 1),
                $assign('2025-26', 'board', 'Team Lead', 'Επικεφαλής Ομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Evangelos', 'el' => 'Ευάγγελος'],
                'last_name' => ['en' => 'Toris', 'el' => 'Τόρης'],
                'linkedin' => 'https://www.linkedin.com/in/toris0ev0may0the0force0be0with0you/',
                'github' => null,
                'email' => 'vagelistor@gmail.com',
                'photo' => 'Toris_Evangelos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'board', 'Public Relations Officer', 'Υπεύθυνος Επικοινωνίας', 2),
                $assign('2025-26', 'board', 'Public Relations Officer', 'Υπεύθυνος Επικοινωνίας', 2),
            ]),

            // Software
            $member([
                'first_name' => ['en' => 'Emmanouil', 'el' => 'Εμμανουήλ'],
                'last_name' => ['en' => 'Raftopoulos', 'el' => 'Ραφτόπουλος'],
                'linkedin' => 'https://www.linkedin.com/in/manolis-raftopoulos',
                'github' => 'https://github.com/MANRAF04',
                'email' => 'stedion70@gmail.com',
                'photo' => 'Emmanouil Raftopoulos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'software', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Vasileios', 'el' => 'Βασίλειος'],
                'last_name' => ['en' => 'Madesis', 'el' => 'Μαδέσης'],
                'linkedin' => 'https://www.linkedin.com/in/vasilis-m-942a9428b/',
                'github' => 'https://github.com/BillM123',
                'email' => 'vmadesis@proton.me',
                'photo' => 'Vasilis Madesis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'software', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Alexandros', 'el' => 'Αλέξανδρος'],
                'last_name' => ['en' => 'Mpesios', 'el' => 'Μπέσιος'],
                'linkedin' => 'https://www.linkedin.com/in/alex-besios-16a622299',
                'github' => 'https://github.com/AlexBesios',
                'email' => 'alexbesios02@gmail.com',
                'photo' => 'Alexandros Mpesios.png',
                'department_id' => $departmentIds['dig-sys'],
            ], [
                $assign('2024-25', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Panagiotis', 'el' => 'Παναγιώτης'],
                'last_name' => ['en' => 'Mpalamotis', 'el' => 'Μπαλαμώτης'],
                'linkedin' => 'https://www.linkedin.com/in/panagiotisbalamotis',
                'github' => 'https://github.com/Balamotakos',
                'email' => 'pa.mpalamotis@gmail.com',
                'photo' => 'Panagiotis Mpalamotis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Nikolaos', 'el' => 'Νικόλαος'],
                'last_name' => ['en' => 'Vatopoulos', 'el' => 'Βατόπουλος'],
                'linkedin' => 'https://www.linkedin.com/in/nikolaos-vatopoulos-252315382?utm_source=share_via&utm_content=profile&utm_medium=member_android',
                'github' => 'https://github.com/NikosVat',
                'email' => 'nikolaos.vatopoulos@gmail.com',
                'photo' => 'Nikolaos Vatopoulos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Thomas', 'el' => 'Θωμάς'],
                'last_name' => ['en' => 'Thomas', 'el' => 'Θωμάς'],
                'linkedin' => null,
                'github' => null,
                'email' => 'thomas.nik.thomas@gmail.com',
                'photo' => 'Thomas Thomas.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Themistoklis', 'el' => 'Θεμιστοκλής'],
                'last_name' => ['en' => 'Sarakiniotis', 'el' => 'Σαρακινιώτης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'themissarak@gmail.com',
                'photo' => 'Themistoklis Sarakiniotis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            // Electrical
            $member([
                'first_name' => ['en' => 'Christos', 'el' => 'Χρήστος'],
                'last_name' => ['en' => 'Vrakatselis', 'el' => 'Βρακατσέλης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'stivjelis@gmail.com',
                'photo' => 'Vrakatselis_Christos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'electrical', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
                $assign('2025-26', 'electrical', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Athanasios', 'el' => 'Αθανάσιος'],
                'last_name' => ['en' => 'Zounidis', 'el' => 'Ζουνίδης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'thanasiszoun@gmail.com',
                'photo' => 'placeholder.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Vasileios', 'el' => 'Βασίλειος'],
                'last_name' => ['en' => 'Ouzas', 'el' => 'Ούζας'],
                'linkedin' => null,
                'github' => 'https://github.com/VasilisOuzas',
                'email' => 'vasilisouzas@gmail.com',
                'photo' => 'Ouzas_Vasilis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Ioannis', 'el' => 'Ιωάννης'],
                'last_name' => ['en' => 'Avradopoulos', 'el' => 'Αβραδόπουλος'],
                'linkedin' => null,
                'github' => null,
                'email' => 'abradopoulos.g@gmail.com',
                'photo' => 'Ioannis Avradopoulos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Konstantinos', 'el' => 'Κωνσταντίνος'],
                'last_name' => ['en' => 'Sdrallis', 'el' => 'Σδράλλης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'sdralliskonstantinos@gmail.com',
                'photo' => 'Konstantinos_Sdrallis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Sokratis', 'el' => 'Σωκράτης'],
                'last_name' => ['en' => 'Soutsiou', 'el' => 'Σούτσιου'],
                'linkedin' => 'https://www.linkedin.com/in/socrates-soutsiou/',
                'github' => 'https://github.com/socrates018',
                'email' => 'socratessuciu8@gmail.com',
                'photo' => 'Soutsiou_Socratis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Dimitrios', 'el' => 'Δημήτριος'],
                'last_name' => ['en' => 'Dakelis', 'el' => 'Δάκελης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'dimitrisdak195@gmail.com',
                'photo' => 'Dimitris Dakelis.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Stelios', 'el' => 'Στέλιος'],
                'last_name' => ['en' => 'Stravachilleas', 'el' => 'Στραβαχιλλέας'],
                'linkedin' => 'https://www.linkedin.com/in/stelios-stravachilleas-3b86b6397?utm_source=share_via&utm_content=profile&utm_medium=member_ios',
                'github' => 'https://github.com/stravinho',
                'email' => 'steliostrav2006@gmail.com',
                'photo' => 'Stravachilleas_Stelios.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Sissy', 'el' => 'Σίσσυ'],
                'last_name' => ['en' => 'Stavrakaki', 'el' => 'Σταυρακάκη'],
                'linkedin' => 'https://www.linkedin.com/in/spyridoula-stavrakaki-1148943b3?utm_source=share_via&utm_content=profile&utm_medium=member_android',
                'github' => null,
                'email' => 'stavrakakisissy2006@gmail.com',
                'photo' => 'Stavrakaki_Sissi.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Stratos', 'el' => 'Στράτος'],
                'last_name' => ['en' => 'Karagiannis', 'el' => 'Καραγιάννης'],
                'linkedin' => 'www.linkedin.com/in/στρατος-καραγιάννης-4735843b4',
                'github' => null,
                'email' => 'kar.stratos007@gmail.com',
                'photo' => 'Karagiannis_Stratos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Georgios', 'el' => 'Γεώργιος'],
                'last_name' => ['en' => 'Papadopoulos', 'el' => 'Παπαδόπουλος'],
                'linkedin' => null,
                'github' => 'https://github.com/papadopgeo1245',
                'email' => 'papadopoulosgeorge007@gmail.com',
                'photo' => 'Papadopoulos_Giorgos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            // Mechanical
            $member([
                'first_name' => ['en' => 'Nikolaos', 'el' => 'Νικόλαος'],
                'last_name' => ['en' => 'Ntaradimos', 'el' => 'Νταραδήμος'],
                'linkedin' => 'https://www.linkedin.com/in/nikolaosntaradimos/',
                'github' => null,
                'email' => 'nck.darad@gmail.com',
                'photo' => 'Nikolaos Ntaradimos.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2024-25', 'mechanical', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Anastasios', 'el' => 'Αναστάσιος'],
                'last_name' => ['en' => 'Georgiadis', 'el' => 'Γεωργιάδης'],
                'linkedin' => 'https://www.linkedin.com/in/anastasios-georgiadis-9446b4368/',
                'github' => null,
                'email' => 'tasosgeorgiades60@gmail.com',
                'photo' => 'Anastasios Georgiadis.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2024-25', 'mechanical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Panagiotis', 'el' => 'Παναγιώτης'],
                'last_name' => ['en' => 'Lampiris', 'el' => 'Λαμπίρης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'panagiotislampiris2014@gmail.com',
                'photo' => 'Panagiotis Lampiris.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2024-25', 'mechanical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Olympia', 'el' => 'Ολυμπία'],
                'last_name' => ['en' => 'Kollia', 'el' => 'Κόλλια'],
                'linkedin' => 'https://linkedin.com/in/olympia-kollia-9ab87b284',
                'github' => null,
                'email' => 'kolliaolympia@gmail.com',
                'photo' => 'Olympia_Kollia.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2024-25', 'mechanical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'kinematics', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Nikolaos', 'el' => 'Νικόλαος'],
                'last_name' => ['en' => 'Tasis', 'el' => 'Τάσης'],
                'linkedin' => 'https://www.linkedin.com/in/nikolaos-tasis/',
                'github' => null,
                'email' => 'nikos.tasisd1@gmail.com',
                'photo' => 'Nikolaos Tasis.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2024-25', 'mechanical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Lydia', 'el' => 'Λυδία'],
                'last_name' => ['en' => 'Dimogkotsi', 'el' => 'Δημογκότση'],
                'linkedin' => 'https://www.linkedin.com/in/λυδία-δημογκότση-48bb043ba',
                'github' => null,
                'email' => 'lydiadimog@gmail.com',
                'photo' => 'Lydia_Dimogotsi.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'kinematics', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Konstantinos', 'el' => 'Κωνσταντίνος'],
                'last_name' => ['en' => 'Kolomvas', 'el' => 'Κολόμβας'],
                'linkedin' => 'https://www.linkedin.com/in/%CE%BA%CF%89%CE%BD%CF%83%CF%84%CE%B1%CE%BD%CF%84%CE%AF%CE%BD%CE%BF%CF%82-%CE%BA%CE%BF%CE%BB%CF%8C%CE%BC%CE%B2%CE%B1%CF%82-7900373bb?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app',
                'github' => null,
                'email' => 'kotus.44.kol.45@gmail.com',
                'photo' => 'Konstantinos_Kolomvas.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'kinematics', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            // Structural
            $member([
                'first_name' => ['en' => 'Nikolaos', 'el' => 'Νικόλαος'],
                'last_name' => ['en' => 'Papatzelos', 'el' => 'Παπατζέλος'],
                'linkedin' => null,
                'github' => null,
                'email' => 'nickpapatzelos@gmail.com',
                'photo' => 'Nikolaos_Papatzelos.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'structural', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Sotiris', 'el' => 'Σωτήρης'],
                'last_name' => ['en' => 'Roussis', 'el' => 'Ρούσσης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'sorousshs@gmail.com',
                'photo' => 'Roussis_Sotiris.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'structural', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Dimitrios', 'el' => 'Δημήτριος'],
                'last_name' => ['en' => 'Keroglou', 'el' => 'Κέρογλου'],
                'linkedin' => null,
                'github' => null,
                'email' => 'kerogloudim05@gmail.com',
                'photo' => 'Dimitrios_Keroglou.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'structural', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            // Aero
            $member([
                'first_name' => ['en' => 'Leonidas', 'el' => 'Λεωνίδας'],
                'last_name' => ['en' => 'Leontiadis', 'el' => 'Λεοντιάδης'],
                'linkedin' => null,
                'github' => null,
                'email' => 'Leontiadisleonidas3@gmail.com',
                'photo' => 'Leontiadis_Leonidas.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'aero', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            // Kinematics
            $member([
                'first_name' => ['en' => 'Alexandros', 'el' => 'Αλέξανδρος'],
                'last_name' => ['en' => 'Theodosiou', 'el' => 'Θεοδωσίου'],
                'linkedin' => 'https://www.linkedin.com/in/alexandros-theodosioy-7834b0368/',
                'github' => null,
                'email' => 'theod.alexander@gmail.com',
                'photo' => 'Theodosiou_Alexandros.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2024-25', 'mechanical', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'kinematics', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            // Finance
            $member([
                'first_name' => ['en' => 'Nikolaos', 'el' => 'Νικόλαος'],
                'last_name' => ['en' => 'Andreoglou', 'el' => 'Ανδρεόγλου'],
                'linkedin' => null,
                'github' => null,
                'email' => 'nikolas.andreoglou@gmail.com',
                'photo' => 'Andreoglou_Nikolaos.png',
                'department_id' => $departmentIds['eco'],
            ], [
                $assign('2024-25', 'finance', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
                $assign('2025-26', 'finance', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Emmanouil', 'el' => 'Εμμανουήλ'],
                'last_name' => ['en' => 'Prokopiou', 'el' => 'Προκοπίου'],
                'linkedin' => null,
                'github' => null,
                'email' => 'man.prokopiou@gmail.com',
                'photo' => 'Manos_Prokopiou.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'finance', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Spyros', 'el' => 'Σπύρος'],
                'last_name' => ['en' => 'Chatziligos', 'el' => 'Χατζηλίγος'],
                'linkedin' => 'https://www.linkedin.com/in/spyros-chatziligos/',
                'github' => null,
                'email' => 'spyrosxatzhligos04@gmail.com',
                'photo' => 'Spyros Chatzyligos.png',
                'department_id' => $departmentIds['eco'],
            ], [
                $assign('2024-25', 'finance', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Ariadni', 'el' => 'Αριάδνη'],
                'last_name' => ['en' => 'Alexiou', 'el' => 'Αλεξίου'],
                'linkedin' => 'https://www.linkedin.com/in/ariadni-alexiou-264957384/',
                'github' => 'https://github.com/alexiou-dev',
                'email' => 'ariadniale@gmail.com',
                'photo' => 'Alexiou_Ariadni.png',
                'department_id' => $departmentIds['eco'],
            ], [
                $assign('2025-26', 'finance', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Cleopatra', 'el' => 'Κλεοπάτρα'],
                'last_name' => ['en' => 'Poulou', 'el' => 'Πούλου'],
                'linkedin' => null,
                'github' => null,
                'email' => 'c.poulou07@gmail.com',
                'photo' => 'Poulou_Cleopatra.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'finance', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Ralia', 'el' => 'Ραλία'],
                'last_name' => ['en' => 'Karakousi', 'el' => 'Καρακούση'],
                'linkedin' => null,
                'github' => null,
                'email' => 'raliakarakousi1@gmail.com',
                'photo' => 'Karakousi_Ralia.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'finance', 'Head of Fundraising', 'Επικεφαλής Χρηματοδοτήσεων', 2),
            ]),

            // Marketing
            $member([
                'first_name' => ['en' => 'Georgios', 'el' => 'Γεώργιος'],
                'last_name' => ['en' => 'Karamanlis', 'el' => 'Καραμανλής'],
                'linkedin' => null,
                'github' => null,
                'email' => 'geokaramanles@gmail.com',
                'photo' => 'Karamanlis_Giorgos.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'marketing', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
                $assign('2025-26', 'marketing', 'Subteam Lead', 'Υπεύθυνος Υποομάδας', 1),
            ]),

            $member([
                'first_name' => ['en' => 'Dimitrios', 'el' => 'Δημήτριος'],
                'last_name' => ['en' => 'Kleidonaris', 'el' => 'Κλειδωνάρης'],
                'linkedin' => 'https://www.linkedin.com/in/dkleidonaris',
                'github' => 'https://github.com/dkleidonaris',
                'email' => 'dkleidonaris@gmail.com',
                'photo' => 'Dimitrios_Kleidonaris.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2024-25', 'marketing', 'Web Developer', 'Υπεύθυνος Ιστοσελίδας', 2),
                $assign('2025-26', 'marketing', 'Web Developer', 'Υπεύθυνος Ιστοσελίδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Evangelia-Maria', 'el' => 'Ευαγγελία-Μαρία'],
                'last_name' => ['en' => 'Karapli', 'el' => 'Καραπλή'],
                'linkedin' => null,
                'github' => null,
                'email' => 'karapli.evaggeliamaria@gmail.com',
                'photo' => 'Evangelia Maria Karapli.png',
                'department_id' => $departmentIds['primary-edu'],
            ], [
                $assign('2024-25', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Ioanna', 'el' => 'Ιωάννα'],
                'last_name' => ['en' => 'Petkou', 'el' => 'Πέτκου'],
                'linkedin' => null,
                'github' => null,
                'email' => 'petkouioanna7@gmail.com',
                'photo' => 'Ioanna Petkou.png',
                'department_id' => $departmentIds['primary-edu'],
            ], [
                $assign('2024-25', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Petros', 'el' => 'Πέτρος'],
                'last_name' => ['en' => 'Zountas', 'el' => 'Ζούντας'],
                'linkedin' => 'https://www.linkedin.com/in/petros-zountas-9b547b27b',
                'github' => null,
                'email' => 'nikos17nikos17@gmail.com',
                'photo' => 'Petros_Zountas.png',
                'department_id' => $departmentIds['civil-eng'],
            ], [
                $assign('2024-25', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
                $assign('2025-26', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Epi', 'el' => 'Έπη'],
                'last_name' => ['en' => 'Tampouri', 'el' => 'Ταμπούρη'],
                'linkedin' => 'https://www.linkedin.com/in/epitampouri/',
                'github' => null,
                'email' => 'epitampouri@gmail.com',
                'photo' => 'epi tampouri.png',
                'department_id' => $departmentIds['bus-admin'],
            ], [
                $assign('2024-25', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Maria-Michaela', 'el' => 'Μαρία-Μιχαέλα'],
                'last_name' => ['en' => 'Petrou', 'el' => 'Πέτρου'],
                'linkedin' => null,
                'github' => null,
                'email' => 'mar.mich.petr@gmail.com',
                'photo' => 'Petrou_Maria_Michaela.png',
                'department_id' => $departmentIds['mech-eng'],
            ], [
                $assign('2025-26', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Theofano', 'el' => 'Θεοφανώ'],
                'last_name' => ['en' => 'Semizoglou', 'el' => 'Σεμίζογλου'],
                'linkedin' => null,
                'github' => null,
                'email' => 'theofanosemizoglou@gmail.com',
                'photo' => 'Semizoglou_Theofano.png',
                'department_id' => $departmentIds['el-eng'],
            ], [
                $assign('2025-26', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),

            $member([
                'first_name' => ['en' => 'Chara', 'el' => 'Χαρά'],
                'last_name' => ['en' => 'Aivatoglou', 'el' => 'Αϊβάτογλου'],
                'linkedin' => 'https://www.linkedin.com/in/chara-aivatoglou-491378390/',
                'github' => null,
                'email' => 'chaivchaiv24@gmail.com',
                'photo' => 'Aivatzoglou_Chara.png',
                'department_id' => $departmentIds['eco'],
            ], [
                $assign('2025-26', 'marketing', 'Subteam Member', 'Μέλος Υποομάδας', 2),
            ]),
        ];

        foreach ($members as $entry) {
            $memberData = $entry['data'];
            $assignments = $entry['assignments'] ?? [];

            $member = TeamMember::updateOrCreate(
                ['email' => $memberData['email']],
                $memberData
            );

            foreach ($assignments as $assignment) {
                $seasonId = $seasonIds[$assignment['season']] ?? null;
                $teamId = $teamIds[$assignment['team']] ?? null;

                if (!$seasonId) {
                    throw new \RuntimeException("Season not found: {$assignment['season']}");
                }

                if (!$teamId) {
                    throw new \RuntimeException("Team not found: {$assignment['team']}");
                }

                TeamMemberAssignment::updateOrCreate(
                    [
                        'team_member_id' => $member->id,
                        'team_id' => $teamId,
                        'season_id' => $seasonId,
                    ],
                    [
                        'role' => $assignment['role'] ?? null,
                        'order' => $assignment['order'] ?? 1,
                    ]
                );
            }
        }


        // Replace only the 2025-26 student team assignments with the official Excel list.
        // This deliberately does NOT touch 2024-25 assignments or 2025-26 professors.
        $season202526Id = $seasonIds['2025-26'] ?? null;

        if (!$season202526Id) {
            throw new \RuntimeException('Season not found: 2025-26');
        }

        $managedTeamIds = $teamIds
            ->only([
                'board',
                'software',
                'electrical',
                'structural',
                'aero',
                'kinematics',
                'business-marketing',
                'finance',
                'marketing',
            ])
            ->values()
            ->all();

        TeamMemberAssignment::query()
            ->where('season_id', $season202526Id)
            ->whereIn('team_id', $managedTeamIds)
            ->delete();

        $member202526 = fn(
            string $firstNameEn,
            string $firstNameEl,
            string $lastNameEn,
            string $lastNameEl,
            string $departmentSlug,
            string $teamSlug,
            string $roleEn,
            string $roleEl,
            int $order,
            ?string $email = null,
            ?string $photo = null,
            ?string $linkedin = null,
            ?string $github = null,
        ) => [
            'data' => [
                'first_name' => ['en' => $firstNameEn, 'el' => $firstNameEl],
                'last_name' => ['en' => $lastNameEn, 'el' => $lastNameEl],
                'linkedin' => $linkedin,
                'github' => $github,
                'email' => $email,
                'photo' => $photo ?? 'placeholder.png',
                'department_id' => $departmentIds[$departmentSlug],
            ],
            'assignment' => [
                'team' => $teamSlug,
                'role' => ['en' => $roleEn, 'el' => $roleEl],
                'order' => $order,
            ],
        ];

        $members202526 = [
            // Αεροδυναμικής
            $member202526('Leonidas', 'Λεωνίδας', 'Leontiadis', 'Λεοντιάδης', 'mech-eng', 'aero', 'Subteam Lead', 'Επικεφαλής Υποομάδας', 1, 'Leontiadisleonidas3@gmail.com', 'Leontiadis_Leonidas.png'),
            $member202526('Konstantinos', 'Κωνσταντίνος', 'Zarogoulidis', 'Ζαρογουλίδης', 'mech-eng', 'aero', 'Subteam Member', 'Μέλος Υποομάδας', 2),

            // Διοικητικό Συμβούλιο
            $member202526('Charalampos', 'Χαράλαμπος', 'Zachariadis', 'Ζαχαριάδης', 'el-eng', 'board', 'Captain', 'Αρχηγός', 1, 'zachariadis.charis@gmail.com', 'Zachariadis_Charis.png', 'https://www.linkedin.com/in/zachariadis-charis/', 'https://github.com/czachariadis'),
            $member202526('Evangelos', 'Ευάγγελος', 'Toris', 'Τόρης', 'el-eng', 'board', 'Public Relations Officer & Treasurer', 'Υπεύθυνος Επικοινωνίας, Ταμίας', 2, 'vagelistor@gmail.com', 'Toris_Evangelos.png', 'https://www.linkedin.com/in/toris0ev0may0the0force0be0with0you/'),

            // Επιχειρηματικών & Προώθησης
            $member202526('Charalampia', 'Χαραλαμπία', 'Aivatoglou', 'Αϊβάτογλου', 'eco', 'business-marketing', 'Subteam Lead', 'Επικεφαλής Υποομάδας', 1, 'chaivchaiv24@gmail.com', 'Aivatzoglou_Chara.png', 'https://www.linkedin.com/in/chara-aivatoglou-491378390/'),
            $member202526('Vasileios', 'Βασίλειος', 'Ouzas', 'Ούζας', 'el-eng', 'business-marketing', 'Subteam Member', 'Μέλος Υποομάδας', 3, 'vasilisouzas@gmail.com', 'Ouzas_Vasilis.png', null, 'https://github.com/VasilisOuzas'),
            $member202526('Ariadni', 'Αριάδνη', 'Alexiou', 'Αλεξίου', 'eco', 'business-marketing', 'Subteam Member', 'Μέλος Υποομάδας', 3, 'ariadniale@gmail.com', 'Alexiou_Ariadni.png', 'https://www.linkedin.com/in/ariadni-alexiou-264957384/', 'https://github.com/alexiou-dev'),
            $member202526('Stavroula', 'Σταυρούλα', 'Karakousi', 'Καρακούση', 'el-eng', 'business-marketing', 'Subteam Member', 'Μέλος Υποομάδας', 3),
            $member202526('Cleopatra', 'Κλεοπάτρα', 'Poulou', 'Πούλου', 'el-eng', 'business-marketing', 'Subteam Member', 'Μέλος Υποομάδας', 3, 'c.poulou07@gmail.com', 'Poulou_Cleopatra.png'),
            $member202526('Maria-Michaela', 'Μαρία Μιχαέλα', 'Petrou', 'Πέτρου', 'mech-eng', 'business-marketing', 'Subteam Member', 'Μέλος Υποομάδας', 3, 'mar.mich.petr@gmail.com', 'Petrou_Maria_Michaela.png'),
            $member202526('Dimitrios', 'Δημήτρης', 'Kleidonaris', 'Κλειδωνάρης', 'el-eng', 'business-marketing', 'Web Developer', 'Υπεύθυνος Ιστοσελίδας', 2, 'dkleidonaris@gmail.com', 'Dimitrios_Kleidonaris.png', 'https://www.linkedin.com/in/dkleidonaris', 'https://github.com/dkleidonaris'),

            // Ηλεκτρολογικών
            $member202526('Christos', 'Χρήστος', 'Vrakatselis', 'Βρακατσέλης', 'el-eng', 'electrical', 'Subteam Lead', 'Επικεφαλής Υποομάδας', 1, 'stivjelis@gmail.com', 'Vrakatselis_Christos.png'),
            $member202526('Spyridoula', 'Σπυριδούλα', 'Stavrakaki', 'Σταυρακάκη', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'stavrakakisissy2006@gmail.com', 'Stavrakaki_Sissi.png', 'https://www.linkedin.com/in/spyridoula-stavrakaki-1148943b3?utm_source=share_via&utm_content=profile&utm_medium=member_android'),
            $member202526('Sokratis', 'Σωκράτης', 'Soutsiou', 'Σούτσιου', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'socratessuciu8@gmail.com', 'Soutsiou_Socratis.png', 'https://www.linkedin.com/in/socrates-soutsiou/', 'https://github.com/socrates018'),
            $member202526('Ioannis', 'Ιωάννης', 'Avradopoulos', 'Αβραδόπουλος', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'abradopoulos.g@gmail.com', 'Ioannis Avradopoulos.png'),
            $member202526('Konstantinos', 'Κωνσταντίνος', 'Sdrallis', 'Σδράλλης', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'sdralliskonstantinos@gmail.com', 'Konstantinos_Sdrallis.png'),
            $member202526('Dimitrios', 'Δημήτριος', 'Dakelis', 'Δάκελης', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'dimitrisdak195@gmail.com', 'Dimitris Dakelis.png'),
            $member202526('Stylianos', 'Στυλιανός', 'Stravachilleas', 'Στραβαχιλλέας', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'steliostrav2006@gmail.com', 'Stravachilleas_Stelios.png', 'https://www.linkedin.com/in/stelios-stravachilleas-3b86b6397?utm_source=share_via&utm_content=profile&utm_medium=member_ios', 'https://github.com/stravinho'),
            $member202526('Stratos', 'Στράτος', 'Karagiannis', 'Καραγιάννης', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'kar.stratos007@gmail.com', 'Karagiannis_Stratos.png', 'www.linkedin.com/in/στρατος-καραγιάννης-4735843b4'),
            $member202526('Georgios', 'Γεώργιος', 'Papadopoulos', 'Παπαδόπουλος', 'el-eng', 'electrical', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'papadopoulosgeorge007@gmail.com', 'Papadopoulos_Giorgos.png', null, 'https://github.com/papadopgeo1245'),

            // Κινηματικής
            $member202526('Alexandros', 'Αλέξανδρος', 'Theodosiou', 'Θεοδωσίου', 'mech-eng', 'kinematics', 'Subteam Lead', 'Επικεφαλής Υποομάδας', 1, 'theod.alexander@gmail.com', 'Theodosiou_Alexandros.png', 'https://www.linkedin.com/in/alexandros-theodosioy-7834b0368/'),
            $member202526('Olympia', 'Ολυμπία', 'Kollia', 'Κόλλια', 'mech-eng', 'kinematics', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'kolliaolympia@gmail.com', 'Olympia_Kollia.png', 'https://linkedin.com/in/olympia-kollia-9ab87b284'),
            $member202526('Lydia', 'Λυδία', 'Dimogkotsi', 'Δημογκότση', 'mech-eng', 'kinematics', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'lydiadimog@gmail.com', 'placeholder.png', 'https://www.linkedin.com/in/λυδία-δημογκότση-48bb043ba'),
            $member202526('Konstantinos', 'Κωνσταντίνος', 'Kolomvas', 'Κολομβάς', 'mech-eng', 'kinematics', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'kotus.44.kol.45@gmail.com', 'Konstantinos_Kolomvas.png', 'https://www.linkedin.com/in/%CE%BA%CF%89%CE%BD%CF%83%CF%84%CE%B1%CE%BD%CF%84%CE%AF%CE%BD%CE%BF%CF%82-%CE%BA%CE%BF%CE%BB%CF%8C%CE%BC%CE%B2%CE%B1%CF%82-7900373bb?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app'),

            // Μηχανολογικού Σχεδίου
            $member202526('Nikolaos', 'Νικόλαος', 'Papatzelos', 'Παπατζέλος', 'mech-eng', 'structural', 'Subteam Lead', 'Επικεφαλής Υποομάδας', 1, 'nickpapatzelos@gmail.com', 'Nikolaos_Papatzelos.png'),
            $member202526('Sotirios', 'Σωτήριος', 'Roussis', 'Ρούσσης', 'mech-eng', 'structural', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'sorousshs@gmail.com', 'Roussis_Sotiris.png'),
            $member202526('Dimitrios', 'Δημήτριος', 'Keroglou', 'Κέρογλου', 'mech-eng', 'structural', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'kerogloudim05@gmail.com', 'Dimitrios_Keroglou.png'),

            // Προγραμματισμού
            $member202526('Vasileios', 'Βασίλης', 'Madesis', 'Μαδέσης', 'el-eng', 'software', 'Subteam Lead', 'Επικεφαλής Υποομάδας', 1, 'vmadesis@proton.me', 'Vasilis Madesis.png', 'https://www.linkedin.com/in/vasilis-m-942a9428b/', 'https://github.com/BillM123'),
            $member202526('Nikolaos', 'Νικόλαος', 'Vatopoulos', 'Βατόπουλος', 'el-eng', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'nikolaos.vatopoulos@gmail.com', 'Nikolaos Vatopoulos.png', 'https://www.linkedin.com/in/nikolaos-vatopoulos-252315382?utm_source=share_via&utm_content=profile&utm_medium=member_android', 'https://github.com/NikosVat'),
            $member202526('Themistoklis', 'Θεμιστοκλής', 'Sarakiniotis', 'Σαρακινιώτης', 'el-eng', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'themissarak@gmail.com', 'Themistoklis Sarakiniotis.png'),
            $member202526('Thomas', 'Θωμάς', 'Thomas', 'Θωμάς', 'el-eng', 'software', 'Subteam Member', 'Μέλος Υποομάδας', 2, 'thomas.nik.thomas@gmail.com', 'Thomas Thomas.png'),
        ];

        foreach ($members202526 as $entry) {
            $memberData = $entry['data'];
            $assignment = $entry['assignment'];

            if (!isset($teamIds[$assignment['team']])) {
                throw new \RuntimeException("Team not found: {$assignment['team']}");
            }

            $teamMember = null;

            if (!empty($memberData['email'])) {
                $teamMember = TeamMember::query()
                    ->where('email', $memberData['email'])
                    ->first();
            }

            if (!$teamMember) {
                $teamMember = TeamMember::query()
                    ->where('first_name->el', $memberData['first_name']['el'])
                    ->where('last_name->el', $memberData['last_name']['el'])
                    ->first();
            }

            if ($teamMember) {
                $teamMember->update(array_filter(
                    $memberData,
                    fn($value) => $value !== null
                ));
            } else {
                $teamMember = TeamMember::create($memberData);
            }

            TeamMemberAssignment::updateOrCreate(
                [
                    'team_member_id' => $teamMember->id,
                    'team_id' => $teamIds[$assignment['team']],
                    'season_id' => $season202526Id,
                ],
                [
                    'role' => $assignment['role'],
                    'order' => $assignment['order'],
                ]
            );
        }
    }
}
