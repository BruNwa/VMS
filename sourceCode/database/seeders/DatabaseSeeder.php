<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SettingTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(BackendMenuTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(DesignationTableSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(VisitorTableSeeder::class);
        $this->call(PreregisterTableSeeder::class);
        $this->call(AttendanceTableSeeder::class);
        $this->call(SiteTableSeeder::class);
        $this->call(SmsGetwayTableSeeder::class);
        $this->call(NotificationTableSeeder::class);
        $this->call(SiteSetupTableSeeder::class);
        $this->call(MailTableSeeder::class);
        $this->call(TemplateTableSeeder::class);
        $this->call(FrontendTableSeeder::class); 
        $this->call(WhatsAppTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
    }
}
