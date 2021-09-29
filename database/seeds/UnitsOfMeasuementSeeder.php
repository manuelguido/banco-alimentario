<?php

use Illuminate\Database\Seeder;
use App\UnitOfMeasurement;

class UnitsOfMeasuementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units_of_measurement = [
            'Kilos',
            'Litros',
            'Cajas',
            'Bolsas',
        ];

        foreach ($units_of_measurement as $element) {
            UnitOfMeasurement::createNew($element);
        }
    }
}
