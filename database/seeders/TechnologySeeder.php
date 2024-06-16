<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'laravel',
            'vue',
            'git',
        ];

        foreach ($technologies as $name) {
            $technology = new Technology();
            $technology->name = $name;
            $technology->slug =Technology::generateSlug($name);
            $technology->save();
        }
    }
}
