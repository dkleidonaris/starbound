<?php

namespace Database\Seeders;

use App\Models\Supporter;
use App\Models\SupporterType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        SupporterType::where('slug', 'galaxy')->first()
            ->supporters()->createMany(
                [

                    [
                        'name' => [
                            'el' => 'Sielman',
                            'en' => 'Sielman'
                        ],
                        'logo' => 'supporters/sielmann.png',
                        'url' => 'https://www.sielman.com/',
                        'order' => 1,
                    ],
                ]
            );

        SupporterType::where('slug', 'gold')->first()
            ->supporters()->createMany(
                [
                    [
                        'name' => [
                            'el' => 'CASLab',
                            'en' => 'CASLab'
                        ],
                        'logo' => 'supporters/caslab.png',
                        'url' => 'https://caslab.e-ce.uth.gr/',
                        'order' => 1,
                    ],
                    [
                        'name' => [
                            'el' => 'Cafe Taf',
                            'en' => 'Cafe Taf'
                        ],
                        'logo' => 'supporters/cafetaf.png',
                        'url' => 'https://cafetaf.gr/',
                        'order' => 2,
                    ],
                    [
                        'name' => [
                            'el' => 'Altair',
                            'en' => 'Altair'
                        ],
                        'logo' => 'supporters/altair.png',
                        'url' => 'https://altair.com/',
                        'bg' => true,
                        'order' => 3,
                    ]
                ]
            );

        $silver = SupporterType::where('slug', 'silver')->first()->supporters()->createMany(
            [
                [
                    'name' => [
                        'el' => 'Fibran',
                        'en' => 'Fibran'
                    ],
                    'logo' => 'supporters/fibran.jpg',
                    'url' => 'https://fibran.gr/',
                    'order' => 1,
                ],
                [
                    'name' => [
                        'el' => 'ISOMAT',
                        'en' => 'ISOMAT'
                    ],
                    'logo' => 'supporters/isomat.png',
                    'url' => 'https://www.isomat.eu/',
                    'order' => 2,
                ],
                [
                    'name' => [
                        'el' => 'Toolhaus',
                        'en' => 'Toolhaus'
                    ],
                    'logo' => 'supporters/toolhaus.png',
                    'url' => 'https://www.instagram.com/toolhaus_sventzouris/',
                    'order' => 3,
                ],
                [
                    'name' => [
                        'el' => 'Λογιστική Ελεγκτική',
                        'en' => 'Logistiki Elegktiki'
                    ],
                    'logo' => 'supporters/logistiki-elegktiki.png',
                    'url' => 'https://accaud.uth.gr/',
                    'order' => 4,
                ]
            ]
        );
        $collaborators = SupporterType::where('slug', 'collaborators')->first()->supporters()->createMany([
            [
                'name' => [
                    'el' => 'Σχολή Γλωσσών SEMIANOVA',
                    'en' => 'SEMIANOVA Language School'
                ],
                'logo' => 'supporters/semianova.svg',
                'bg' => true,
                'url' => 'https://www.instagram.com/semianova.russian/',
                'order' => 1,
            ],
            [
                'name' => [
                    'el' => 'Coin 3D Project',
                    'en' => 'Coin 3D Project'
                ],
                'logo' => 'supporters/coin-3d-project.jpg',
                'url' => 'https://coin3d-project.eu/',
                'order' => 2,
            ],
            [
                'name' => [
                    'el' => 'Ansys',
                    'en' => 'Ansys'
                ],
                'logo' => 'supporters/ansys.webp',
                'url' => 'https://www.ansys.com/',
                'order' => 3,
            ],
            [
                'name' => [
                    'el' => 'Simtec',
                    'en' => 'Simtec'
                ],
                'logo' => 'supporters/simtec.png',
                'url' => 'https://simtec-europe.com/',
                'bg' => true,
                'order' => 4,
            ],
            [
                'name' => [
                    'el' => 'Altium',
                    'en' => 'Altium'
                ],
                'logo' => 'supporters/altium.png',
                'url' => 'https://www.altium.com/',
                'bg' => true,
                'order' => 5,
            ],
            [
                'name' => [
                    'el' => 'Solidworks',
                    'en' => 'Solidworks'
                ],
                'logo' => 'supporters/solidworks.png',
                'url' => 'https://www.solidworks.com/',
                'order' => 6,
            ],
            [
                'name' => [
                    'el' => 'Beta CAE Systems',
                    'en' => 'Beta CAE Systems'
                ],
                'logo' => 'supporters/beta-cae-systems.png',
                'url' => 'https://www.beta-cae.com/',
                'order' => 7,
            ]
        ]);
    }
}
