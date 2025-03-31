<?php

namespace Database\Seeders;

use Setting as SeederSetting;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            $envService = new EnvEditor();
            $settingArray['apiKey']                   = $envService->getValue('DEMO') ? 'AIzaSyDg1xBSwmHKV0usIKxTFL5a6fFTb4s3XVM' : '';
            $settingArray['authDomain']               = $envService->getValue('DEMO') ? 'quickpass-inilabs.firebaseapp.com' : '';
            $settingArray['projectId']                = $envService->getValue('DEMO') ? 'quickpass-inilabs' : '';
            $settingArray['storageBucket']            = $envService->getValue('DEMO') ? 'quickpass-inilabs.appspot.com' : '';
            $settingArray['messagingSenderId']        = $envService->getValue('DEMO') ? '843456771665' : '';
            $settingArray['appId']                    = $envService->getValue('DEMO') ? '1:843456771665:web:fb1e3115e9e17ee1582a70' : '';
            $settingArray['measurementId']            = $envService->getValue('DEMO') ? 'G-GSJPS921XW' : '';
            $settingArray['fcm_secret_key']           = $envService->getValue('DEMO') ? 'BKAvKJbnB3QATdp8n1aUo_uhoNK3exVKLVzy7MP8VKydjjzthdlAWdlku6LQISxm4zA7dWoRACI9AHymf4V64kA' : '';
            SeederSetting::set($settingArray);
            SeederSetting::save();
        }

}
