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
        $neighborhoods = [
            'Abasto',
            'Arana',
            'Etcheverry',
            'Olmos',
            'Los hornos',
            'Altos San Lorenzo',
            'Villa Elvira',
            'Romero',
            'San Carlos',
            'Tolosa',
            'Ringuelet',
            'Gonnet',
            'Gorina',
            'City Bell',
            'Villa Elisa',
            'Arturo Seguí',
            'El Peligro',
            'Casco Urbano (Centro)',
        ];

        foreach ($neighborhoods as $n) {
            Neighborhood::createNewByName($n);
        }
    }
}
