<?php

namespace Database\Seeders;

use App\Models\ThemeSetting;
use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            ThemeSetting::updateOrCreate(['key' => 'site_logo']);
            ThemeSetting::updateOrCreate(['key' => 'fav_icon']);
        }
    }
}
