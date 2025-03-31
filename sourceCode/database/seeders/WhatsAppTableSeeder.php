<?php

namespace Database\Seeders;

use Setting as SeederSetting;
use Illuminate\Database\Seeder;

class WhatsAppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $whatsappSettingArray = [
            'whatsapp_accept_message' => 'Your visit request has been approved! We look forward to welcoming you. Please arrive on time. Thank you!',
            'whatsapp_decline_message' => 'Unfortunately, we are unable to approve your visit request at this time. We apologize for any inconvenience caused.'
        ];

        SeederSetting::set($whatsappSettingArray);
        SeederSetting::save();
    }
}
