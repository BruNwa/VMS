<?php

namespace Database\Seeders;

use Setting as SeederSetting;
use Illuminate\Database\Seeder;

class SmsGetwayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingArray['twilio_auth_token']  = '';
        $settingArray['twilio_account_sid'] = '';
        $settingArray['twilio_from']        = '';
        $settingArray['twilio_disabled']    = 1;
        
        SeederSetting::set($settingArray);
        SeederSetting::save();
    }
}
