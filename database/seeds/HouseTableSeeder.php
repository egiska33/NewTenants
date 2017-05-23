<?php

use Illuminate\Database\Seeder;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1,
                'city' => 'Vilnius',
                'address' => 'Gedimino g. 11',
                'tenant_id' => 1,
            ],
            ['id' => 2,
                'city' => 'Vilnius',
                'address' => 'Taikos g. 12',
                'tenant_id' => 2,
            ],
            ['id' => 3,
                'city' => 'Kaunas',
                'address' => 'Savanorių pr. 22',
                'tenant_id' => 3,
            ],
            ['id' => 4,
                'city' => 'Alytus',
                'address' => 'Laisvės g. 5',
                'tenant_id' => 4,
            ],
            ['id' => 5,
                'city' => 'Vilnius',
                'address' => 'Vilniaus g. 77',
                'tenant_id' => 5,
            ],
            ['id' => 6,
                'city' => 'Kaunas',
                'address' => 'Vilniaus g. 10',
                'tenant_id' => 6,
            ]
        ];
        foreach ($items as $item) {
            \App\House::create($item);
        }
    }
}
