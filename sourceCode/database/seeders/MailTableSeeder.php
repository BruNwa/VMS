<?php

namespace Database\Seeders;

use App\Enums\Activity;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;
use Setting as SeederSetting;
use Illuminate\Support\Facades\Artisan;

class MailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $envService = new EnvEditor();

        SeederSetting::set('mail_mailer', 'smtp');
        SeederSetting::set('mail_host', $envService->getValue('DEMO') ? 'mail.inilabs.dev' : 'mailhog');
        SeederSetting::set('mail_port', $envService->getValue('DEMO') ? '465' : '1025');
        SeederSetting::set('mail_username', $envService->getValue('DEMO') ? 'inilabsd@inilabs.dev' : '');
        SeederSetting::set('mail_password', $envService->getValue('DEMO') ? 'rb-XO$3~dc4q' : '');
        SeederSetting::set('mail_encryption', $envService->getValue('DEMO') ? 'ssl' : '');
        SeederSetting::set('mail_from_name', $envService->getValue('DEMO') ? 'visitor pass management system' : '');
        SeederSetting::set('mail_from_address', $envService->getValue('DEMO') ? 'inilabsd@inilabs.dev' : '');
        SeederSetting::set('mail_disabled', Activity::ENABLE);

        SeederSetting::save();

        $envService->addData([
            'MAIL_MAILER'       => 'smtp',
            'MAIL_HOST'         => $envService->getValue('DEMO') ? 'mail.inilabs.dev' : 'mailhog',
            'MAIL_PORT'         => $envService->getValue('DEMO') ? '465' : '1025',
            'MAIL_USERNAME'     => $envService->getValue('DEMO') ? 'inilabsd@inilabs.dev' : '',
            'MAIL_PASSWORD'     => $envService->getValue('DEMO') ? 'rb-XO$3~dc4q' : '',
            'MAIL_ENCRYPTION'   => $envService->getValue('DEMO') ? 'ssl' : '',
            'MAIL_FROM_NAME'    => $envService->getValue('DEMO') ? 'visitor pass management system' : '',
            'MAIL_FROM_ADDRESS' => $envService->getValue('DEMO') ? 'inilabsd@inilabs.dev' : ''
        ]);

        Artisan::call('optimize:clear');
    }
}
