<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
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
             'title' => 'Nuomos sutartis',
             'content' => 'Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna.',
             'house_id' => 1,
            ],
            ['id' => 2,
             'title' => 'Nuomos sutartis',
             'content' => 'Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna.',
             'house_id' => 2,
            ],
            ['id' => 3,
             'title' => 'Nuomos sutartis',
             'content' => 'Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna.',
             'house_id' => 3,
            ],
            ['id' => 4,
             'title' => 'Nuomos sutartis',
             'content' => 'Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna.',
             'house_id' => 4,
            ],
            ['id' => 5,
             'title' => 'Nuomos sutartis',
             'content' => 'Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna.',
             'house_id' => 5,
            ],
            ['id' => 6,
             'title' => 'Nuomos sutartis',
             'content' => 'Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna.',
             'house_id' => 6,
            ]
        ];
        foreach ($items as $item) {
            \App\Document::create($item);
        }
    }
}
