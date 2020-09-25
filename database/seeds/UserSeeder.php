<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Organization;
use App\Institution;
use App\Responsable;
use App\UserData;
use App\Address;
use App\Giver;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Creates new user
         *
         * @return user_id
         */
        function new_user($email, $role)
        {
            $user = new User;
            $user->email = $email;
            $user->password = Hash::make('password');
            $user->is_active = true;
            $user->save();
            $user->set_role($role);
            return $user->user_id;
        }

        /**
         * Creates new user data
         *
         * @return void
         */
        function new_user_data($user_id)
        {
            $user_data = new UserData;
            $user_data->user_id = $user_id;
            $user_data->name = Str::random(6);
            $user_data->lastname = Str::random(6);
            $user_data->phone = mt_rand(1000000, 99999999);
            $user_data->document_type_id = 1;
            $user_data->document_number = mt_rand(1000000, 99999999);
            $user_data->save();
        }

        /**
         * Creates new user
         *
         * @return user_id
         */
        function new_institution($name, $email, $role)
        {
            // New User
            $user_id = new_user($email, $role);

            // New institution
            $institution = new Institution;
            $institution->institution = $name;
            $institution->user_id = $user_id;
            $institution->cuit = mt_rand(1000000, 99999999);
            $institution->phone = mt_rand(1000000, 99999999);
            $institution->save();

            // New entity (Giver or Organization)
            $entity = ($role == Role::ROLE_GIVER) ? new Giver : new Organization;
            $entity->user_id = $user_id;
            $entity->save();

            // New responsable
            $responsable = new Responsable;
            $responsable->name = Str::random(6);
            $responsable->lastname = Str::random(6);
            $responsable->phone = mt_rand(1000000, 99999999);
            $responsable->document_type_id = 1;
            $responsable->document_number = mt_rand(1000000, 99999999);
            $responsable->user_id = $user_id;
            $responsable->save();

            // New address
            $address = new Address;
            $address->street = Str::random(6);
            $address->number = mt_rand(100, 10000);
            $address->floor = mt_rand(1, 20);
            $address->apt = Str::random(1);
            $address->neighborhood_id = 1;
            $address->user_id = $user_id;
            $address->save();
        }

        /**
         * New admin
         */
        $user_id = new_user('admin@gmail.com', Role::ROLE_ADMIN);
        new_user_data($user_id);

        /**
         * New employee
         */
        $user_id = new_user('employee@gmail.com', Role::ROLE_EMPLOYEE);
        new_user_data($user_id);

        /**
         * New giver
         */
        new_institution('Walmart', 'giver@gmail.com', Role::ROLE_GIVER);
 
        /**
         * New organization
         */
        new_institution('Comedor', 'organization@gmail.com', Role::ROLE_ORGANIZATION);
    }
}
