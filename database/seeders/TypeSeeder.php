<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creo 5 tipi di prodotti
        $allTypes = [
            'Food',
            'Drink',
            'Clothes',
            'Furniture',
            'Electronics'
        ];

        foreach ($allTypes as $singleType) {
            $type = Type::create([
                'title' => $singleType,
                //TODO possibile problema? 
                'slug' => Str::slug($singleType)
            ]);
        }
    }
}
