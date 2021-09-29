<?php

use Illuminate\Database\Seeder;
use App\CategoryType;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_types = ['Alimentos', 'Productos de limpieza'];

        foreach ($category_types as $ct) {
            CategoryType::createNew($ct);
        }
    }
}
