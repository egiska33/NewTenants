<?php

use Illuminate\Database\Seeder;

class LandlordTableSeeder extends Seeder
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
                'first_name' => 'Petras',
                'last_name' => 'Petraitis',
                'email' => 'petras@gmail.com',
                'phone' => 861234567,
                'user_id' => 2
            ],
            ['id' => 2,
                'first_name' => 'Jonas',
                'last_name' => 'Jonaitis',
                'email' => 'jonas@gmail.com',
                'phone' => 861234567,
                'user_id' => 3
            ],
            ['id' => 3,
                'first_name' => 'Antanas',
                'last_name' => 'Antanaitis',
                'email' => 'antanas@gmail.com',
                'phone' => 861234567,
                'user_id' => 4
            ],

        ];

        foreach ($items as $item) {
            \App\Landlord::create($item);
        }
    }
}
