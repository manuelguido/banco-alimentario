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
     * @return void
     */
    public function run()
    {
        $globalPassword = 'password';        

        /**
         * Crear nuevo usuario.
         * @return App\User.
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
         * Generar nombres y apellidos para datos.
         * @return String.
         */
        function generateName($last = false)
        {
            $names = ['María', 'Pedro', 'Juan', 'Rodrigo', 'Carla', 'Pilar', 'Eugenio'];
            return $names[rand(0, (count($names)-1))];
        }
        function generateLastName()
        {
            $lastnames = ['López', 'Gutierrez', 'Gómez'];
            return $lastnames[rand(0, (count($lastnames)-1))];
        }

        /**
         * Crear información aleatoria de un usuario.
         * @return Array.
         */
        function generateUserData($user_id)
        {
            return [
                'user_id' => $user_id,
                'name' => generateName(),
                'lastname' => generateLastname(),
                'phone' => mt_rand(1000000, 99999999),
                'document_type_id' => 1,
                'document_number' => mt_rand(1000000, 99999999),
            ];
        }

        /**
         * Crear información aleatoria de una dirección.
         * @return Array.
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
         * @return Array.
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
