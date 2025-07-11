<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\UserSeeder;
use Database\Seeders\AccessSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\JobSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\SkillSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\TextSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AccessSeeder::class,
            ContactSeeder::class, 
            CourseSeeder::class, 
            JobSeeder::class, 
            LanguageSeeder::class, 
            SkillSeeder::class,
            ProjectSeeder::class, 
            TextSeeder::class,
        ]);
    }
}
