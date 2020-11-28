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
        \App\Models\Cv::factory()
            ->times(10)
            ->hasAddress(1)
            ->hasInstitutions(1)
            ->hasWorkplaces(1)
            ->create();
    }
}
