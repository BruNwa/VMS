<?php
namespace Database\Seeders;
use App\Enums\Status;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Dipokhalder\EnvEditor\EnvEditor;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $departmentNames = ['Operation', 'IT', 'Marketing', 'Service', 'Production'];
        $departments = [];

        $isDemo = (new EnvEditor())->getValue('DEMO');
        if ($isDemo) {
            foreach ($departmentNames as $name) {
                $departments[] = [
                    'name'      => $name,
                    'status'    => Status::ACTIVE,
                ];
            }
            Department::insert($departments);
        }
    }

}
