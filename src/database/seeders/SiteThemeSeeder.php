<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Nowyouwerkn\WerknHub\Models\SiteTheme; 

class SiteThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteTheme::create([
            'name' => 'werkn-backbone-bootstrap',
            'description' => 'Apariencia inicial para cualquier excelente página informativa usando Werkn Hub, basado exlusivamente en Bootstrap 5.0',
            'image' => 'no-image.jpg',
            'is_active' => true,
            'version' => '1.0'
        ]);
    }
}
