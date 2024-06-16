<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Tecnologia',
            'Scienza',
            'Arte',
            'Musica',
            'Sport',
            'Cucina',
            'Viaggi',
            'Moda',
            'Salute',
            'Storia'
        ];

        foreach ($categories as $name) {
            $category = new Category();
            $category->name = $name;
            $category->slug =Category::generateSlug($name);
            $category->save();
        }
    }
}
