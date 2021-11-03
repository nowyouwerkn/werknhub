<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Nowyouwerkn\WerknHub\Models\Country;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'code' => 'US',
            'name' => 'United States of America'
        ]);

        Country::create([
            'code' => 'MX',
            'name' => 'México'
        ]);
    }
}
