<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_type_id' => 1, 'category' => 'Lacteos'],
            ['category_type_id' => 1, 'category' => 'Frutas/Verduras'],
            ['category_type_id' => 1, 'category' => 'Legumbres'],
            ['category_type_id' => 1, 'category' => 'Carne/Pescado/Huevo'],
            ['category_type_id' => 1, 'category' => 'Café/Yerba/Té'],
            ['category_type_id' => 1, 'category' => 'Aceite/Vinagre'],
            ['category_type_id' => 1, 'category' => 'Galletas'],
            ['category_type_id' => 1, 'category' => 'Otros'],
            ['category_type_id' => 2, 'category' => 'Lavandina'],
            ['category_type_id' => 2, 'category' => 'Detergentes'],
            ['category_type_id' => 2, 'category' => 'Esponjas/Rejillas'],
            ['category_type_id' => 2, 'category' => 'Otros'],
        ];

        foreach ($categories as $category) {
            Category::createNew($category);
        }
    }
}
