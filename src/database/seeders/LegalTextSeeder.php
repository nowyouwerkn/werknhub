<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Nowyouwerkn\WerknHub\Models\LegalText;

class LegalTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LegalText::create([
            'title' => 'Política de Devoluciones',
            'slug' => 'politica-de-devoluciones',
        ]);

        LegalText::create([
            'title' => 'Aviso de Privacidad',
            'slug' => 'aviso-de-privacidad',
        ]);

        LegalText::create([
            'title' => 'Términos y Condiciones',
            'slug' => 'terminos-y-condiciones',
        ]);
    }
}
