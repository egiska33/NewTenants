<?php

use Illuminate\Database\Seeder;

class TenantTableSeeder extends Seeder
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
                'first_name' => 'Tomas',
                'last_name' => 'Tomaitis',
                'email' => 'tomas@gmail.com',
                'phone' => 861234567,
                'user_id' => 5,
            ],
            ['id' => 2,
                'first_name' => 'Rokas',
                'last_name' => 'Rokaitis',
                'email' => 'rokas@gmail.com',
                'phone' => 861234567,
                'user_id' => 6,
            ],
            ['id' => 3,
                'first_name' => 'Mindaugas',
                'last_name' => 'Mindaugaitis',
                'email' => 'mindaugas@gmail.com',
                'phone' => 861234567,
                'user_id' => 7,
            ],
            ['id' => 4,
                'first_name' => 'Vytautas',
                'last_name' => 'Vytautaitis',
                'email' => 'vytautas@gmail.com',
                'phone' => 861234567,
                'user_id' => 8,
            ],
            ['id' => 5,
                'first_name' => 'Egidijus',
                'last_name' => 'Egidijaitis',
                'email' => 'egidijus@gmail.com',
                'phone' => 861234567,
                'user_id' => 9,
            ],
            ['id' => 6,
                'first_name' => 'Gediminas',
                'last_name' => 'Gediminaitis',
                'email' => 'gediminas@gmail.com',
                'phone' => 861234567,
                'user_id' => 10,
            ],
        ];

        foreach ($items as $item) {
            \App\Tenant::create($item);
        }
    }
}
