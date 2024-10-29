<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Schema;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Schema::disableForeignKeyConstraints();
        // // truncate the table before seeding
        // Type::truncate();
        // Schema::enableForeignKeyConstraints();


        // oppure
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

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
