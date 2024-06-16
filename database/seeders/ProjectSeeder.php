<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\project;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pathProjects = __DIR__ . "/projects.csv";
        $csvProjects = fopen($pathProjects, "r");
    
        if ($csvProjects === false) {
            exit("Cannot open $pathProjects");
        }
    
        $count = false;
        while (($row = fgetcsv($csvProjects)) !== false) {
            if (!$count) {
                $count = true;
            } 
            else {
                $newProject = new Project();
                $newProject->title = $row[0];
                $newProject->content = $row[1];
                $newProject->slug = Project::generateSlug($newProject->title);
                $newProject->save();
            }
        }
        fclose($csvProjects);
    }
    
}