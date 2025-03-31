<?php
namespace Database\Seeders;

use App\Enums\Role as EnumsRole;
use App\Models\User;
use App\Enums\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
       $admin =  User::create([
            'first_name'        => 'John',
            'last_name'         => 'Doe',
            'username'          => 'admin',
            'email'             => 'admin@example.com',
            'phone'             => '1500555000',
            'country_code'      => "880",
            'country_code_name' => "bd",
            'status'            => Status::ACTIVE,
            'address'           => 'Dhaka, Bangladesh',
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10),
        ]);
        $role = Role::find(EnumsRole::ADMIN);
        $admin->assignRole($role->name);

        $reception = User::create([
            'first_name'        => 'Carmela J',
            'last_name'         => 'Vogel',
            'username'          => 'Vogel',
            'email'             => 'reception@example.com',
            'phone'             => '5074090329',
            'country_code'      => "880",
            'country_code_name' => "bd",
            'status'            => Status::ACTIVE,
            'address'           => 'Dhaka, Bangladesh',
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10),
        ]);

        $role = Role::find(EnumsRole::RECEPTION);
        $reception->assignRole($role->name);
    }
}
