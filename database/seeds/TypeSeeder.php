<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'type_id' => 1,
            'type' => 'Alimentos',
        ]);
        DB::table('types')->insert([
            'type_id' => 2,
            'type' => 'Limpieza',
        ]);
    }
}
