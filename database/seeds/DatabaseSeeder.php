<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(LandlordTableSeeder::class);
        $this->call(TenantTableSeeder::class);
        $this->call(HouseTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        $this->call(TaskTableSeeder::class);

    }
}
