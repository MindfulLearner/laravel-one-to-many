<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // truncate the table before seeding
        Product::truncate();
        // by using faker we can create a random product
        for ($i = 0; $i < 10; $i++) {
            $name = fake()->sentence(2);
            $slug = self::createSlug($name);
            Product::create([
                // creating slug from name
                'slug' => $slug,
                'name' => $name,

                'description' => fake()->text(),
                'price' => fake()->randomFloat(2, 1, 100),
                'cover_image' => fake()->optional()->imageUrl(640, 480, 'animals'),
                'likes' => fake()->numberBetween(0, 100),
                'published' => fake()->boolean()
            ]);
        }
    }

    /**
     * 
     * from overflow https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
     */
    public static function createSlug($name, string $divider = '-')
    {
        // replace non letter or digit by divider
        $name = preg_replace('~[^\pL\d]+~u', $divider, $name);
        
        // transliterate
        $name = iconv('utf-8', 'us-ascii//TRANSLIT', $name);
        
        // remove unwanted characters
        $name = preg_replace('~[^-\w]+~', '', $name);
        
        // trim
        $name = trim($name, $divider);
        
        // remove duplicate divider
        $name = preg_replace('~-+~', $divider, $name);
        
        // lowercase
        $name = strtolower($name);
        
        if (empty($name)) {
            return 'n-a';
        }
        
        return $name;
    }
}
