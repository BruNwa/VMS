<?php

namespace Database\Seeders;

use Setting as SeederSetting;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $envService = new EnvEditor();
        $settingArray['invite_templates']   = $envService->getValue('DEMO') ? 'Hello' : '';
        $settingArray['notify_templates']   = $envService->getValue('DEMO') ? 'Hello Employee Someone wants meet you, his/her name is' : '';

        SeederSetting::set($settingArray);
        SeederSetting::save();
    }
}
