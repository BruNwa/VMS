<?php

namespace Database\Seeders;

use App\Enums\SiteSetup;
use Setting as SeederSetting;
use Illuminate\Database\Seeder;

class SiteSetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siteSettingArray = [
            'front_end_enable_disable' => SiteSetup::ENABLE,
            'notifications_email'      => SiteSetup::ENABLE,
            'whatsapp_setup'           => SiteSetup::ENABLE,
            'photo_capture_enable'     => SiteSetup::ENABLE,
            'terms_visibility_status'  => SiteSetup::ENABLE,
        ];

        SeederSetting::set($siteSettingArray);
        SeederSetting::save();
    }
}
