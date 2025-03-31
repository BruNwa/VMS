<?php

namespace Database\Seeders;

use App\Enums\Ask;
use Carbon\Carbon;
use App\Enums\Gender;
use App\Enums\Status;
use App\Models\Visitor;
use App\Models\PreRegister;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class PreregisterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preregisters = [
            [
                "first_name"                    => "Disuza",
                "last_name"                     => "Costa",
                "email"                         => "disuza@example.com",
                "phone"                         => "15005550777",
                "country_code"                  => "1",
                "country_code_name"             => "us",
                "gender"                        => Gender::MALE,
                "address"                       => "Phoenix, USA",
                "national_identification_no"    => "098765432",
                "is_pre_register"               => Ask::YES,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                'preregister' => [
                    [
                        'visitor_id'    => 2,
                        'employee_id'   => 1,
                        'expected_date' => Carbon::now()->addDay(2),
                        'expected_time' => Carbon::now()->addHours(1),
                        'comment'       => 'You are awsome i wanna meet again',
                        'editor_id'     => 1,
                        'editor_type'   => 'App\Models\User',
                        'creator_id'    => 1,
                        'creator_type'  => 'App\Models\User',
                    ],
                ],
            ],
            [
                "first_name"                    => "Jane",
                "last_name"                     => "Smith",
                "email"                         => "jane@example.com",
                "phone"                         => "15005550999",
                "country_code"                  => "44",
                "country_code_name"             => "uk",
                "gender"                        => Gender::FEMALE,
                "address"                       => "London, UK",
                "national_identification_no"    => "987654321",
                "is_pre_register"               =>  Ask::YES,
                "status"                        => Status::INACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                'preregister' => [
                    [
                        'visitor_id'    => 2,
                        'employee_id'   => 2,
                        'expected_date' => Carbon::now()->addDay(5),
                        'expected_time' => Carbon::now()->addHours(4),
                        'comment'       => 'Let’s discuss the project details.',
                        'editor_id'     => 1,
                        'editor_type'   => 'App\Models\User',
                        'creator_id'    => 1,
                        'creator_type'  => 'App\Models\User',
                    ],
                ],
            ],
            [
                "first_name"                    => "Maria",
                "last_name"                     => "Gonzalez",
                "email"                         => "maria@example.com",
                "phone"                         => "30005551234",
                "country_code"                  => "34",
                "country_code_name"             => "es",
                "gender"                        => Gender::FEMALE,
                "address"                       => "Madrid, Spain",
                "national_identification_no"    => "543216789",
                "is_pre_register"               =>  Ask::YES,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                'preregister' => [
                    [
                        'visitor_id'    => 3,
                        'employee_id'   => 3,
                        'expected_date' => Carbon::now()->addDay(10),
                        'expected_time' => Carbon::now()->addHours(6),
                        'comment'       => 'Please confirm the schedule.',
                        'editor_id'     => 1,
                        'editor_type'   => 'App\Models\User',
                        'creator_id'    => 1,
                        'creator_type'  => 'App\Models\User',
                    ],
                ],
            ],
            [
                "first_name"                    => "Yuki",
                "last_name"                     => "Tanaka",
                "email"                         => "yuki@example.com",
                "phone"                         => "810555123456",
                "country_code"                  => "81",
                "country_code_name"             => "jp",
                "gender"                        => Gender::FEMALE,
                "address"                       => "Tokyo, Japan",
                "national_identification_no"    => "321098765",
                "is_pre_register"               =>  Ask::YES,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                'preregister' => [
                    [
                        'visitor_id'    => 4,
                        'employee_id'   => 4,
                        'expected_date' => Carbon::now()->addDay(14),
                        'expected_time' => Carbon::now()->addHours(8),
                        'comment'       => 'Excited for the meeting.',
                        'editor_id'     => 1,
                        'editor_type'   => 'App\Models\User',
                        'creator_id'    => 1,
                        'creator_type'  => 'App\Models\User',
                    ],
                ],
            ],
            [
                "first_name"                    => "Hans",
                "last_name"                     => "Müller",
                "email"                         => "hans@example.com",
                "phone"                         => "490555123456",
                "country_code"                  => "49",
                "country_code_name"             => "de",
                "gender"                        => Gender::MALE,
                "address"                       => "Berlin, Germany",
                "national_identification_no"    => "234567890",
                "is_pre_register"               => Ask::YES,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                'preregister' => [
                    [
                        'visitor_id'    => 5,
                        'employee_id'   => 5,
                        'expected_date' => Carbon::now()->addDay(3),
                        'expected_time' => Carbon::now()->addHours(9),
                        'comment'       => 'Looking forward to discussing new opportunities.',
                        'editor_id'     => 1,
                        'editor_type'   => 'App\Models\User',
                        'creator_id'    => 1,
                        'creator_type'  => 'App\Models\User',
                    ],
                ],
            ]
        ];

        $isDemo = (new EnvEditor())->getValue('DEMO');
        if ($isDemo) {
            foreach ($preregisters as $visitor) {
                $createdVisitor = Visitor::create([
                    'first_name'                 => $visitor['first_name'],
                    'last_name'                  => $visitor['last_name'],
                    'email'                      => $visitor['email'],
                    'phone'                      => $visitor['phone'],
                    'country_code'               => $visitor['country_code'],
                    'country_code_name'          => $visitor['country_code_name'],
                    'gender'                     => $visitor['gender'],
                    'address'                    => $visitor['address'],
                    'national_identification_no' => $visitor['national_identification_no'],
                    'is_pre_register'            => $visitor['is_pre_register'],
                    'status'                     => $visitor['status'],
                    'editor_type'                => $visitor['editor_type'],
                    'creator_type'               => $visitor['creator_type'],
                    'creator_id'                 => $visitor['creator_id'],
                    'editor_id'                  => $visitor['editor_id'],
                ]);

                if (isset($visitor['preregister']) && is_array($visitor['preregister'])) {
                    foreach ($visitor['preregister'] as $preregister) {
                        PreRegister::create([
                            'visitor_id'    => $createdVisitor->id,
                            'employee_id'   => $preregister['employee_id'],
                            'expected_date' => $preregister['expected_date'],
                            'expected_time' => $preregister['expected_time'],
                            'comment'       => $preregister['comment'],
                            'editor_id'     => $preregister['editor_id'],
                            'editor_type'   => $preregister['editor_type'],
                            'creator_id'    => $preregister['creator_id'],
                            'creator_type'  => $preregister['creator_type'],
                        ]);
                    }
                }
            }
        }
    }
}
