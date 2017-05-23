<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            /**
             *
             *      Admin
             *
             */

            ['id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 1,
                'remember_token' => ''
            ],
            /**
             *
             *      LandLords
             *
             */
            ['id' => 2,
                'name' => 'Petras',
                'email' => 'petras@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 2,
                'remember_token' => ''
            ],

            ['id' => 3,
                'name' => 'Jonas',
                'email' => 'jonas@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 2,
                'remember_token' => ''
            ],

            ['id' => 4,
                'name' => 'Antanas',
                'email' => 'antanas@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 2,
                'remember_token' => ''
            ],
            /**
             *
             *      Tenants
             *
             */

            ['id' => 5,
                'name' => 'Tomas',
                'email' => 'tomas@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 3,
                'remember_token' => ''
            ],
            ['id' => 6,
                'name' => 'Rokas',
                'email' => 'rokas@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 3,
                'remember_token' => ''
            ],
            ['id' => 7,
                'name' => 'Mindaugas',
                'email' => 'mindaugas@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 3,
                'remember_token' => ''
            ],
            ['id' => 8,
                'name' => 'Vytautas',
                'email' => 'vytautas@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 3,
                'remember_token' => ''
            ],
            ['id' => 9,
                'name' => 'Egidijus',
                'email' => 'egidijus@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 3,
                'remember_token' => ''
            ],
            ['id' => 10,
                'name' => 'Gediminas',
                'email' => 'gediminas@gmail.com',
                'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
                'role_id' => 3,
                'remember_token' => ''
            ],
        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
