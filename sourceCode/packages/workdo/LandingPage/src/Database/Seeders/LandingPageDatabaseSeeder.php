<?php

namespace Workdo\LandingPage\Database\Seeders;

use App\Facades\ModuleFacade as Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LandingPageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionTableSeeder::class);
        $this_module = Module::find('LandingPage');
        $this_module->enable();
        $modules = Module::all();
        if (module_is_active('LandingPage')) {
            foreach ($modules as $key => $value) {
                $name = '\Workdo\\' . $value->name;
                $path =   $value->getPath();
                if (file_exists($path . '/src/Database/Seeders/MarketPlaceSeederTableSeeder.php')) {
                    $this->call($name . '\Database\Seeders\MarketPlaceSeederTableSeeder');
                }
            }
        };
    }
}
