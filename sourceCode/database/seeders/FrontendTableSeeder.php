<?php

namespace Database\Seeders;

use Setting as SeederSetting;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class FrontendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $envService = new EnvEditor();
        $settingArray['site_description']   = $envService->getValue('DEMO') ? 'Visitor Pass Management System.' : '';
        $settingArray['welcome_screen']     = $envService->getValue('DEMO') ? 'Welcome, please tap on button to check-in' : '';

        SeederSetting::set($settingArray);
        SeederSetting::save();
    }

}
