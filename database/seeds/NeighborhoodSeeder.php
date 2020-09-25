<?php

use Illuminate\Database\Seeder;
use App\Neighborhood;

class NeighborhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        function new_neighborhood($name)
        {
            $neighborhood = new Neighborhood;
            $neighborhood->neighborhood = $name;
            $neighborhood->save();
        }

        $neighborhoods = [
            'Abasto',
            'Arana',
            'Casco Urbano (Centro)',
        ];

        foreach ($neighborhoods as $n) {
            new_neighborhood($n);
        }
    }
}
