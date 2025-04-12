<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Weight_logsTableSeeder::class,
            Weight_targetsTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
