<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\Gender;
use App\Enums\Status;
use App\Enums\UserRole;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Dipokhalder\EnvEditor\EnvEditor;
use Illuminate\Support\Facades\Hash;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $envService = new EnvEditor();
        if ($envService->getValue('DEMO')) {

            $employees = [
                [
                    "first_name"        => "John",
                    "last_name"         => "Doe",
                    "username"          => "Employee1",
                    "email"             => "employee@example.com",
                    "phone"             => "1500555481",
                    "country_code"      => "1",
                    "country_code_name" => "us",
                    "status"            => Status::ACTIVE,
                    "address"           => "New York, USA",
                    "password"          => Hash::make("123456"),
                    "remember_token"    => Str::random(10),
                    "employee"          => [
                        'gender'            => Gender::MALE,
                        'department_id'     => 1,
                        'designation_id'    => 1,
                        'date_of_joining'   => Carbon::now()->addDays(1),
                        'about'             => '',
                        'status'            => Status::ACTIVE,
                        'creator_type'      => 'App\Models\User',
                        'creator_id'        => 1,
                        'editor_type'       => 'App\Models\User',
                        'editor_id'         => 1,
                    ],
                ],
                [
                    "first_name"        => "Emily",
                    "last_name"         => "Clark",
                    "username"          => "Employee2",
                    "email"             => "emily.clark@example.com",
                    "phone"             => "1500555482",
                    "country_code"      => "1",
                    "country_code_name" => "us",
                    "status"            => Status::ACTIVE,
                    "address"           => "Los Angeles, USA",
                    "password"          => Hash::make("123456"),
                    "remember_token"    => Str::random(10),
                    "employee"          => [
                        'gender'            => Gender::FEMALE,
                        'department_id'     => 2,
                        'designation_id'    => 2,
                        'date_of_joining'   => Carbon::now()->addDays(2),
                        'about'             => '',
                        'status'            => Status::ACTIVE,
                        'creator_type'      => 'App\Models\User',
                        'creator_id'        => 1,
                        'editor_type'       => 'App\Models\User',
                        'editor_id'         => 1,
                    ],
                ],
                [
                    "first_name"        => "Michael",
                    "last_name"         => "Smith",
                    "username"          => "Employee3",
                    "email"             => "michael.smith@example.com",
                    "phone"             => "1500555483",
                    "country_code"      => "1",
                    "country_code_name" => "us",
                    "status"            => Status::ACTIVE,
                    "address"           => "Chicago, USA",
                    "password"          => Hash::make("123456"),
                    "remember_token"    => Str::random(10),
                    "employee"          => [
                        'gender'            => Gender::MALE,
                        'department_id'     => 3,
                        'designation_id'    => 3,
                        'date_of_joining'   => Carbon::now()->addDays(3),
                        'about'             => '',
                        'status'            => Status::ACTIVE,
                        'creator_type'      => 'App\Models\User',
                        'creator_id'        => 1,
                        'editor_type'       => 'App\Models\User',
                        'editor_id'         => 1,
                    ],
                ],
                [
                    "first_name"        => "Sophia",
                    "last_name"         => "Miller",
                    "username"          => "Employee4",
                    "email"             => "sophia.miller@example.com",
                    "phone"             => "1500555484",
                    "country_code"      => "1",
                    "country_code_name" => "us",
                    "status"            => Status::ACTIVE,
                    "address"           => "Houston, USA",
                    "password"          => Hash::make("123456"),
                    "remember_token"    => Str::random(10),
                    "employee"          => [
                        'gender'            => Gender::FEMALE,
                        'department_id'     => 4,
                        'designation_id'    => 4,
                        'date_of_joining'   => Carbon::now()->addDays(4),
                        'about'             => '',
                        'status'            => Status::ACTIVE,
                        'creator_type'      => 'App\Models\User',
                        'creator_id'        => 1,
                        'editor_type'       => 'App\Models\User',
                        'editor_id'         => 1,
                    ],
                ],
                [
                    "first_name"        => "David",
                    "last_name"         => "Brown",
                    "username"          => "Employee5",
                    "email"             => "david.brown@example.com",
                    "phone"             => "1500555485",
                    "country_code"      => "1",
                    "country_code_name" => "us",
                    "status"            => Status::ACTIVE,
                    "address"           => "San Francisco, USA",
                    "password"          => Hash::make("123456"),
                    "remember_token"    => Str::random(10),
                    "employee"          => [
                        'gender'            => Gender::MALE,
                        'department_id'     => 5,
                        'designation_id'    => 5,
                        'date_of_joining'   => Carbon::now()->addDays(5),
                        'about'             => '',
                        'status'            => Status::ACTIVE,
                        'creator_type'      => 'App\Models\User',
                        'creator_id'        => 1,
                        'editor_type'       => 'App\Models\User',
                        'editor_id'         => 1,
                    ],
                ],
            ];

            foreach ($employees as $data) {
                $createdUser = User::create([
                    'first_name'        => $data['first_name'],
                    'last_name'         => $data['last_name'],
                    'username'          => $data['username'],
                    'email'             => $data['email'],
                    'phone'             => $data['phone'],
                    'country_code'      => $data['country_code'],
                    'country_code_name' => $data['country_code_name'],
                    'status'            => $data['status'],
                    'address'           => $data['address'],
                    'password'          => $data['password'],
                    'remember_token'    => $data['remember_token'],
                ]);

                $role = Role::find(UserRole::EMPLOYEE);
                if ($role) {
                    $createdUser->assignRole($role->name);
                }

                if (!empty($data['employee'])) {
                    $employeeData = $data['employee'];
                    Employee::create([
                        'first_name'      => $data['first_name'],
                        'last_name'       => $data['last_name'],
                        'user_id'         => $createdUser->id,
                        'phone'           => $data['phone'],
                        'gender'          => $employeeData['gender'],
                        'department_id'   => $employeeData['department_id'],
                        'designation_id'  => $employeeData['designation_id'],
                        'date_of_joining' => $employeeData['date_of_joining'],
                        'about'           => $employeeData['about'],
                        'status'          => $employeeData['status'],
                        'creator_type'    => $employeeData['creator_type'],
                        'creator_id'      => $employeeData['creator_id'],
                        'editor_type'     => $employeeData['editor_type'],
                        'editor_id'       => $employeeData['editor_id'],
                    ]);
                }
            }
        }
    }
}
