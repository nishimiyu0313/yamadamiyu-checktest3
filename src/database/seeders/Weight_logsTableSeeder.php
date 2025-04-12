<?php

namespace Database\Seeders;

use App\Models\Weight_log;
use Illuminate\Database\Seeder;

class Weight_logsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weight_log::factory()->count(35)->create();
    }
}
