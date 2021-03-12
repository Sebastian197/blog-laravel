<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create([
            'title' => 'Desarrollo Aplicación Web',
            'url_clean' => 'desarrollo-aplicación-web'
        ]);

        Category::create([
            'title' => 'Desarrollo Aplicación multimedia',
            'url_clean' => 'desarrollo-aplicación-multimedia'
        ]);

        Category::create([
            'title' => 'Administración de Sitemas Informáticos en Red',
            'url_clean' => 'administración-de-sitemas-informáticos-en-red'
        ]);
    }
}