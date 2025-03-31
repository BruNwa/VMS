<?php

namespace Database\Seeders;

use App\Enums\Activity;
use Setting as SeederSetting;
use Illuminate\Database\Seeder;

class NotificationAlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingArray['notifications_email']      = Activity::ENABLE;
        $settingArray['notifications_sms']        = Activity::ENABLE;
        $settingArray['sms_gateway']              = Activity::ENABLE;
        $settingArray['front_end_enable_disable'] = Activity::ENABLE;
        $settingArray['photo_capture_enable']     = Activity::ENABLE;
        $settingArray['terms_visibility_status']  = Activity::ENABLE;
        $settingArray['whatsapp_message']         = Activity::ENABLE;

        SeederSetting::set($settingArray);
        SeederSetting::save();
    }
}
