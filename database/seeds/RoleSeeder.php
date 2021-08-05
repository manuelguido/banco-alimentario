<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [Role::ROLE_ADMIN, Role::ROLE_EMPLOYEE, Role::ROLE_GIVER, Role::ROLE_ORGANIZATION];
        foreach ($roles as $role) {
            $new = new Role;
            $new->role = $role;
            $new->save();
        }
    }
}
