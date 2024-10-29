<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // ho messo questo prima di product seeder perche product dipende da type
            TypeSeeder::class,
            ProductSeeder::class,
         
        ]);

    }
}
