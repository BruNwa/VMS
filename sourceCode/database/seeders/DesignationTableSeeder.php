<?php
namespace Database\Seeders;
use App\Enums\Status;
use App\Models\Designation;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designationNames = ['HR Director', 'Chief Human Resource Officer', 'General HR Manager', 'Superintendent', 'Production Manager'];
        $designations = [];

        $isDemo = (new EnvEditor())->getValue('DEMO');
        if($isDemo) {
            foreach ($designationNames as $name) {
                $designations[] = [
                    'name'      => $name,
                    'status'    => Status::ACTIVE,
                ];
            }
            Designation::insert($designations);
        }
    }
}
