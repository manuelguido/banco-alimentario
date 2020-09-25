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
        $admin = new Role;
        $admin->role = Role::ROLE_ADMIN;
        $admin->save();

        $employee = new Role;
        $employee->role = Role::ROLE_EMPLOYEE;
        $employee->save();

        $giver = new Role;
        $giver->role = Role::ROLE_GIVER;
        $giver->save();

        $organization = new Role;
        $organization->role = Role::ROLE_ORGANIZATION;
        $organization->save();
    }
}
