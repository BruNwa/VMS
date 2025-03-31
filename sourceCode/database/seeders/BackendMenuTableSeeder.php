<?php

namespace Database\Seeders;

use App\Models\BackendMenu;
use Illuminate\Database\Seeder;

class BackendMenuTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $parent = [
            'operations'     => 2,
            'visitor'        => 6,
            'attendance'     => 9,
            'administrators' => 11,
            'reports'        => 13,
            'setup'          => 17,
        ];

        $menus = [
            [
                'name'      => 'dashboard',
                'link'      => 'dashboard',
                'icon'      => 'fa-solid fa-laptop',
                'parent_id' => 0,
                'priority'  => 9000,
                'status'    => 1,
            ],
            [
                'name'      => 'operations',
                'link'      => '#',
                'icon'      => 'fa-regular fa-building',
                'parent_id' => 0,
                'priority'  => 81,
                'status'    => 1,
            ],
            [
                'name'      => 'departments',
                'link'      => 'departments',
                'icon'      => 'fa-regular fa-building',
                'parent_id' => $parent['operations'],
                'priority'  => 8800,
                'status'    => 1,
            ],
            [
                'name'      => 'designations',
                'link'      => 'designations',
                'icon'      => 'fa-solid fa-layer-group',
                'parent_id' => $parent['operations'],
                'priority'  => 8700,
                'status'    => 1,
            ],
            [
                'name'      => 'employees',
                'link'      => 'employees',
                'icon'      => 'fa-solid fa-users-rectangle',
                'parent_id' => $parent['operations'],
                'priority'  => 8600,
                'status'    => 1,
            ],
            [
                'name'      => 'visitor',
                'link'      => '#',
                'icon'      => 'fa-solid fa-id-card',
                'parent_id' => 0,
                'priority'  => 81,
                'status'    => 1,
            ],
            [
                'name'      => 'visitors',
                'link'      => 'visitors',
                'icon'      => 'fa fa-user',
                'parent_id' => $parent['visitor'],
                'priority'  => 8600,
                'status'    => 1,
            ],

            [
                'name'      => 'pre_registers',
                'link'      => 'pre-registers',
                'icon'      => 'fa-regular fa-address-card',
                'parent_id' => $parent['visitor'],
                'priority'  => 8600,
                'status'    => 1,
            ],
            [
                'name'      => 'attendance',
                'link'      => '#',
                'icon'      => 'fa-solid fa-user-clock',
                'parent_id' => 0,
                'priority'  => 81,
                'status'    => 1,
            ],
            [
                'name'      => 'attendance',
                'link'      => 'attendance',
                'icon'      => 'fa-solid fa-user-clock',
                'parent_id' => $parent['attendance'],
                'priority'  => 8600,
                'status'    => 1,
            ],
            [
                'name'      => 'administrators',
                'link'      => '#',
                'icon'      => 'fas fa-id-card,ti ti-address-book',
                'parent_id' => 0,
                'priority'  => 81,
                'status'    => 1,
            ],
            [
                'name'      => 'users',
                'link'      => 'adminusers',
                'icon'      => 'fa fa-users',
                'parent_id' => $parent['administrators'],
                'priority'  => 8400,
                'status'    => 1,
            ],
                        
            [
                'name'      => 'reports',
                'link'      => '#',
                'icon'      => 'fa fa-file',
                'parent_id' => 0,
                'priority'  => 8500,
                'status'    => 1,
            ],
            [
                'name'      => 'visitor_report',
                'link'      => 'admin-visitor-report',
                'icon'      => 'fa fa-list-alt',
                'parent_id' => $parent['reports'],
                'priority'  => 74,
                'status'    => 1,
            ],
            [
                'name'      => 'pre_registers_report',
                'link'      => 'admin-pre-registers-report',
                'icon'      => 'fa-regular fa-rectangle-list',
                'parent_id' => $parent['reports'],
                'priority'  => 74,
                'status'    => 1,
            ],
            [
                'name'      => 'attendance_report',
                'link'      => 'attendance-report',
                'icon'      => 'fa fa-clock',
                'parent_id' => $parent['reports'],
                'priority'  => 74,
                'status'    => 1,
            ],
            [
                'name'      => 'setup',
                'link'      => '#',
                'icon'      => 'fa-solid fa-gear',
                'parent_id' => 0,
                'priority'  => 81,
                'status'    => 1,
            ],
            [
                'name'      => 'settings',
                'link'      => 'setting',
                'icon'      => 'fa-solid fa-gear',
                'parent_id' => $parent['setup'],
                'priority'  => 2400,
                'status'    => 1,
            ],

        ];

        BackendMenu::insert($menus);
    }
}
