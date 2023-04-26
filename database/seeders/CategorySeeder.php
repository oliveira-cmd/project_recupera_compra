<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create(['name'   => 'Produtos']);
        Categorie::create(['name'   => 'Calçados']);
        Categorie::create(['name'   => 'Chinelos']);
        Categorie::create(['name'   => 'Musicas']);
        Categorie::create(['name'   => 'Mesa']);
        Categorie::create(['name'   => 'Notebooks']);
        Categorie::create(['name'   => 'Processadores']);
        Categorie::create(['name'   => 'Teclados']);
        Categorie::create(['name'   => 'Monitores']);
        Categorie::create(['name'   => 'HeadPhones']);
        Categorie::create(['name'   => 'Smartphones']);
        
    }
}