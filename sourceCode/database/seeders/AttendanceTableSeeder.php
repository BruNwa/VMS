<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attendances = [
            [
                'title'         => 'Office',
                'date'          => Carbon::now(),
                'checkin_time'  => Carbon::now()->addHours(5),
                'checkout_time' => '',
                'user_id'       => 1,
            ],
        ];

        $isDemo = (new EnvEditor())->getValue('DEMO');
        if ($isDemo) {
            foreach ($attendances as $attendance) {
                Attendance::create([
                    'title'         => $attendance['title'],
                    'date'          => $attendance['date'],
                    'checkin_time'  => $attendance['checkin_time'],
                    'checkout_time' => $attendance['checkout_time'],
                    'user_id'       => $attendance['user_id'],
                ]);
            }
        }
    }
}
