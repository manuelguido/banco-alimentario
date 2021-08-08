<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class, // Done
            DocumentTypeSeeder::class, // Done
            NeighborhoodSeeder::class, //Done
            UserSeeder::class, // Done
            TypeSeeder::class, // Done
            CategorySeeder::class, // Done
            DonationStatusSeeder::class, // Done
        ]);
    }
}
