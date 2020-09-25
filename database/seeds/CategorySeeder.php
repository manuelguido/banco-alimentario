<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_id' => 1,
            'type_id' => 1,
            'category' => 'Lacteos',
        ]);
        DB::table('categories')->insert([
            'category_id' => 2,
            'type_id' => 1,
            'category' => 'Verduras / Frutas',
        ]);
        DB::table('categories')->insert([
            'category_id' => 3,
            'type_id' => 1,
            'category' => 'Legumbres',
        ]);
        DB::table('categories')->insert([
            'category_id' => 4,
            'type_id' => 1,
            'category' => 'Carnes / Pescado / Huevos',
        ]);
        DB::table('categories')->insert([
            'category_id' => 5,
            'type_id' => 1,
            'category' => 'Café / Yerba / Té',
        ]);
        DB::table('categories')->insert([
            'category_id' => 6,
            'type_id' => 1,
            'category' => 'Aceites / Vinagre',
        ]);
        DB::table('categories')->insert([
            'category_id' => 7,
            'type_id' => 1,
            'category' => 'Galletas',
        ]);
        DB::table('categories')->insert([
            'category_id' => 8,
            'type_id' => 1,
            'category' => 'Lacteos',
        ]);
        DB::table('categories')->insert([
            'category_id' => 9,
            'type_id' => 2,
            'category' => 'Lavandina',
        ]);
        DB::table('categories')->insert([
            'category_id' => 10,
            'type_id' => 2,
            'category' => 'Detergente',
        ]);
        DB::table('categories')->insert([
            'category_id' => 11,
            'type_id' => 2,
            'category' => 'Rejillas / Esponjas',
        ]);
    }
}
