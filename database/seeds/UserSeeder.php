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
        $globalPassword = 'password';
        /**
         * Creates new user
         *
         * @return App\User;
         */
        function createUser($email, $password, $role, $name = '')
        {
            $data = ['email' => $email, 'password' => $password];
            $user = User::createNew($data, true); // Crear el usuario
            UserData::createNew($user->user_id, generateUserData($user->user_id)); // Crear la información de usuario
            $user->setRole($role);
            // Si es donante u organización: Crear datos de su institución y dirección
            if ($role == Role::ROLE_GIVER || $role == Role::ROLE_ORGANIZATION) {
                Institution::createNew($user->user_id, generateInstitution($user->user_id, $name));
                Address::createNew($user->user_id, generateAddress($user->user_id));
            }
        }

        /**
         * Crear información aleatoria de un usuario
         *
         * @return Array
         */
        function generateUserData($user_id)
        {
            return [
                'user_id' => $user_id,
                'name' => Str::random(6),
                'lastname' => Str::random(6),
                'phone' => mt_rand(1000000, 99999999),
                'document_type_id' => 1,
                'document_number' => mt_rand(1000000, 99999999),
            ];
        }

        /**
         * Crear información aleatoria de una dirección
         *
         * @return Array
         */
        function generateInstitution($user_id)
        {
            return [
                'user_id' => $user_id,
                'institution' => Str::random(8),
                'cuit' => mt_rand(10000000, 99999999),
                'phone' => mt_rand(10000000, 99999999),
            ];
        }

        /**
         * Crear información aleatoria de una dirección
         *
         * @return Array
         */
        function generateAddress($user_id)
        {
            return [
                'user_id' => $user_id,
                'neighborhood_id' => 1,
                'street' => Str::random(6),
                'number' => mt_rand(100, 9999),
                'floor' => strval(mt_rand(1, 12)),
                'apt' => Str::random(1),
            ];
        }

        // /**
        //  * Creates new user
        //  *
        //  * @return user_id
        //  */
        // function new_institution($name, $email, $role)
        // {
        //     // New User
        //     $user_id = new_user($email, $role);

        //     // New institution
        //     $institution = new Institution;
        //     $institution->institution = $name;
        //     $institution->user_id = $user_id;
        //     $institution->cuit = mt_rand(1000000, 99999999);
        //     $institution->phone = mt_rand(1000000, 99999999);
        //     $institution->save();

        //     // New entity (Giver or Organization)
        //     $entity = ($role == Role::ROLE_GIVER) ? new Giver : new Organization;
        //     $entity->user_id = $user_id;
        //     $entity->save();

        //     // New responsable
        //     $responsable = new Responsable;
        //     $responsable->name = Str::random(6);
        //     $responsable->lastname = Str::random(6);
        //     $responsable->phone = mt_rand(1000000, 99999999);
        //     $responsable->document_type_id = 1;
        //     $responsable->document_number = mt_rand(1000000, 99999999);
        //     $responsable->user_id = $user_id;
        //     $responsable->save();

        //     // New address
        //     $address = new Address;
        //     $address->street = Str::random(6);
        //     $address->number = mt_rand(100, 10000);
        //     $address->floor = mt_rand(1, 20);
        //     $address->apt = Str::random(1);
        //     $address->neighborhood_id = 1;
        //     $address->user_id = $user_id;
        //     $address->save();
        // }

        /**
         * Nuevo administrador
         */
        createUser('administrador@balimentario.com', $globalPassword, Role::ROLE_ADMIN);

        /**
         * Nuevo empleado
         */
        createUser('empleado@balimentario.com', $globalPassword, Role::ROLE_EMPLOYEE);

        /**
         * Nuevo donante
         */
        createUser('walmart@balimentario.com', $globalPassword, Role::ROLE_GIVER, 'Walmart');
        createUser('carrefour@balimentario.com', $globalPassword, Role::ROLE_GIVER, 'Carrefour');
 
        /**
         * Nueva organización
         */
        createUser('organizacion1@balimentario.com', $globalPassword, Role::ROLE_ORGANIZATION, 'Comedor 1');
        createUser('organizacion2@balimentario.com', $globalPassword, Role::ROLE_ORGANIZATION, 'Comedor 2');
        createUser('organizacion3@balimentario.com', $globalPassword, Role::ROLE_ORGANIZATION, 'Comedor 3');
        createUser('organizacion4@balimentario.com', $globalPassword, Role::ROLE_ORGANIZATION, 'Comedor 4');
    }
}
