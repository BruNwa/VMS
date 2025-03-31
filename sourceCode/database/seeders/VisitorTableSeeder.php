<?php

namespace Database\Seeders;

use App\Enums\Ask;
use Carbon\Carbon;
use App\Enums\Gender;
use App\Enums\Status;
use App\Models\Visitor;
use App\Enums\VisitorStatus;
use App\Models\VisitingDetails;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class VisitorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visitors = [
            [
                "first_name"                    => "Emiliano",
                "last_name"                     => "Leon",
                "email"                         => "isabella@example.com",
                "phone"                         => "15005551567",
                "country_code"                  => "1",
                "country_code_name"             => "us",
                "gender"                        => Gender::MALE,
                "address"                       => "New York, USA",
                "national_identification_no"    => "123456789",
                "is_pre_register"               =>  Ask::NO,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                'visitor_details' => [
                    [
                        'reg_no'        => '1012245',
                        'purpose'       => 'Official Meeting',
                        'company_name'  => 'The Infinity Invention Labs',
                        'status'        => VisitorStatus::ACCEPT,
                        'employee_id'   => 1,
                        'checkin_at'    => Carbon::now(),
                        'checkout_at'   => Carbon::now()->addHours(2),
                        'editor_id'     => 1,
                        'editor_type'   => 'App\Models\User',
                        'creator_id'    => 1,
                        'creator_type'  => 'App\Models\User',
                    ],
                ],
            ],
            [
                "first_name"                    => "Sophia",
                "last_name"                     => "Garcia",
                "email"                         => "sophia@example.com",
                "phone"                         => "15005552222",
                "country_code"                  => "1",
                "country_code_name"             => "us",
                "gender"                        => Gender::FEMALE,
                "address"                       => "Los Angeles, USA",
                "national_identification_no"    => "987654321",
                "is_pre_register"               => Ask::NO,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 2,
                "editor_id"                     => 2,
                "visitor_details"               => [
                    [
                        "reg_no"        => "2013245",
                        "purpose"       => "Business Discussion",
                        "company_name"  => "Tech Solutions Inc.",
                        "status"        => VisitorStatus::PENDDING,
                        "employee_id"   => 2,
                        "checkin_at"    => null,
                        "checkout_at"   => null,
                        "editor_id"     => 1,
                        "editor_type"   => "App\Models\User",
                        "creator_id"    => 1,
                        "creator_type"  => "App\Models\User",
                    ],
                ],
            ],
            [
                "first_name"                    => "Liam",
                "last_name"                     => "Williams",
                "email"                         => "liam@example.com",
                "phone"                         => "15005553333",
                "country_code"                  => "1",
                "country_code_name"             => "us",
                "gender"                        => Gender::MALE,
                "address"                       => "Chicago, USA",
                "national_identification_no"    => "456123789",
                "is_pre_register"               => Ask::NO,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                "visitor_details"               => [
                    [
                        "reg_no"        => "3014245",
                        "purpose"       => "Project Review",
                        "company_name"  => "Global Innovations",
                        "status"        => VisitorStatus::ACCEPT,
                        "employee_id"   => 3,
                        "checkin_at"    => Carbon::now(),
                        "checkout_at"   => Carbon::now()->addHours(1),
                        "editor_id"     => 1,
                        "editor_type"   => "App\Models\User",
                        "creator_id"    => 1,
                        "creator_type"  => "App\Models\User",
                    ],
                ],
            ],
            [
                "first_name"                    => "Ava",
                "last_name"                     => "Brown",
                "email"                         => "ava@example.com",
                "phone"                         => "15005554444",
                "country_code"                  => "1",
                "country_code_name"             => "us",
                "gender"                        => Gender::FEMALE,
                "address"                       => "Houston, USA",
                "national_identification_no"    => "789456123",
                "is_pre_register"               => Ask::NO,
                "status"                        => Status::INACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                "visitor_details"               => [
                    [
                        "reg_no"        => "4015245",
                        "purpose"       => "Client Meeting",
                        "company_name"  => "Alpha Enterprises",
                        "status"        => VisitorStatus::REJECT,
                        "employee_id"   => 4,
                        "editor_id"     => 1,
                        "editor_type"   => "App\Models\User",
                        "creator_id"    => 1,
                        "creator_type"  => "App\Models\User",
                    ],
                ],
            ],
            [
                "first_name"                    => "Noah",
                "last_name"                     => "Davis",
                "email"                         => "noah@example.com",
                "phone"                         => "15005556666",
                "country_code"                  => "1",
                "country_code_name"             => "us",
                "gender"                        => Gender::MALE,
                "address"                       => "Phoenix, USA",
                "national_identification_no"    => "321654987",
                "is_pre_register"               => Ask::NO,
                "status"                        => Status::ACTIVE,
                "editor_type"                   => "App\Models\User",
                "creator_type"                  => "App\Models\User",
                "creator_id"                    => 1,
                "editor_id"                     => 1,
                "visitor_details"               => [
                    [
                        "reg_no"        => "5016245",
                        "purpose"       => "Site Inspection",
                        "company_name"  => "Mega Builders",
                        "status"        => VisitorStatus::ACCEPT,
                        "employee_id"   => 5,
                        "checkin_at"    => Carbon::now(),
                        "editor_id"     => 1,
                        "editor_type"   => "App\Models\User",
                        "creator_id"    => 1,
                        "creator_type"  => "App\Models\User",
                    ],
                ],
            ]
        ];

        $isDemo = (new EnvEditor())->getValue('DEMO');
        if ($isDemo) {
            foreach ($visitors as $visitor) {
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

                if (!empty($visitor['visitor_details'])) {
                    foreach ($visitor['visitor_details'] as $visitorDetail) {
                        VisitingDetails::create([
                            'reg_no'       => $visitorDetail['reg_no'],
                            'purpose'      => $visitorDetail['purpose'],
                            'company_name' => $visitorDetail['company_name'],
                            'status'       => $visitorDetail['status'],
                            'user_id'      => $createdVisitor->id,
                            'employee_id'  => $visitorDetail['employee_id'],
                            'visitor_id'   => $createdVisitor->id,
                            'checkin_at'   => $visitorDetail['checkin_at'] ?? null,
                            'checkout_at'  => $visitorDetail['checkout_at'] ?? null,
                            'editor_id'    => $visitorDetail['editor_id'],
                            'editor_type'  => $visitorDetail['editor_type'],
                            'creator_id'   => $visitorDetail['creator_id'],
                            'creator_type' => $visitorDetail['creator_type'],
                        ]);
                    }
                }
            }
        }
    }
}
