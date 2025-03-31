<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Setting as SeederSetting;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $siteArray['site_name']         = 'QuickPass - Appointment Booking & Visitor Gate Pass System With Qr Code';
            $siteArray['site_email']        = 'info@inilabs.net';
            $siteArray['site_phone_number'] = '+8801777664206';
            $siteArray['site_address']      = 'Dhaka, Bangladesh.';
            $siteArray['timezone']          = 'Asia/Dhaka';
            $siteArray['locale']            = 'en';
            $siteArray['site_footer']       = '© Quickpass by iNiLabs '.date('Y').', All Rights Reserved';
            $siteArray['purchase_code']     = session()->has('purchase_code') ? session()->get('purchase_code') : "";
            $siteArray['purchase_username'] = session()->has('purchase_username') ? session()->get('purchase_username') : "";
            SeederSetting::set($siteArray);
            SeederSetting::save();

    }
}
