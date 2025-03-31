<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Requests\EmployeeChekinRequest;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\PreRegister;
use App\Models\VisitingDetails;
use App\Http\Services\Employee\EmployeeService;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class EmployeeController extends BackendController
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        parent::__construct();
        $this->employeeService = $employeeService;
        $this->middleware('auth');
        $this->data['sitetitle'] = 'Employees';

        $this->middleware(['permission:employees'])->only('index');
        $this->middleware(['permission:employees_create'])->only('create', 'store');
        $this->middleware(['permission:employees_edit'])->only('edit', 'update');
        $this->middleware(['permission:employees_delete'])->only('destroy');
        $this->middleware(['permission:employees_show'])->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employeeService->all();
        return view('admin.employee.index', $this->data);
    }

    public function create(Request $request)
    {

        $this->data['designations'] = Designation::where('status', Status::ACTIVE)->get();
        $this->data['departments'] = Department::where('status', Status::ACTIVE)->get();

        return view('admin.employee.create', $this->data);
    }

    public function store(EmployeeRequest $request)
    {
        $this->employeeService->make($request);
        return redirect()->route('admin.employees.index')->withSuccess('The data inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $this->data['employee'] = $this->employeeService->find($id);
        return view('admin.employee.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['employee'] = $this->employeeService->find($id);
        $this->data['designations'] = Designation::where('status', Status::ACTIVE)->get();
        $this->data['departments'] = Department::where('status', Status::ACTIVE)->get();
        return view('admin.employee.edit', $this->data);
    }
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $this->employeeService->update($employee->id, $request);
        return redirect()->route('admin.employees.index')->withSuccess('The data updated successfully!');
    }


    public function checkEmployee(EmployeeChekinRequest $request, $id)
    {
        $this->employeeService->check($id, $request);
        return back()->with(['success' => 'Employee Checkin updated successfully.']);
    }

    public function destroy($id)
    {
        $this->employeeService->delete($id);
        return redirect()->route('admin.employees.index')->with(['success' => 'Employee delete successfully.']);
    }


    public function getEmployees()
    {
        $employees = $this->employeeService->all();
        return Datatables::of($employees)
            ->addColumn('action', function ($employee) {
                return action_button([
                    'view'   => ['route' => route('admin.employees.show', $employee), 'permission' => 'employees_show'],
                    'edit'   => ['route' => route('admin.employees.edit', $employee), 'permission' => 'employees_edit'],
                ]);
            })
            ->editColumn('name', function ($employee) {
                return Str::limit($employee->name, 50);
            })
            ->editColumn('email', function ($employee) {
                return Str::limit(optional($employee->user)->email, 50);
            })
            ->editColumn('phone', function ($employee) {
                return optional($employee->user)->CountryCodeWithPhone;
            })
            ->editColumn('status', function ($employee) {
                return ($employee->status == 5 ? '<span class="text-green-600 bg-green-100 db-table-badge">' . trans('statuses.' . Status::ACTIVE) : '<span class="text-red-600 bg-red-100 db-table-badge">' . trans('statuses.' . Status::INACTIVE));
            })
            ->editColumn('date_of_joining', function ($employee) {
                return date_time_format($employee->date_of_joining);
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }

    public function getVisitor($id)
    {
        $visitors = VisitingDetails::where(['employee_id' => $id])->orderBy('id', 'desc')->get();
        return Datatables::of($visitors)
            ->addColumn('action', function ($visitor) {
                return action_button([
                    'view'   => ['route' => route('admin.visitors.show', $visitor), 'permission' => 'visitors_show'],
                    'edit'   => ['route' => route('admin.visitors.edit', $visitor), 'permission' => 'visitors_edit'],
                    'delete' => ['route' => route('admin.visitors.destroy', $visitor), 'permission' => 'visitors_delete'],
                ]);
            })

            ->editColumn('name', function ($visitor) {
                return Str::limit(optional($visitor->visitor)->name, 50);
            })
            ->editColumn('email', function ($visitor) {
                return Str::limit(optional($visitor->visitor)->email, 50);
            })
            ->editColumn('date', function ($visitor) {
                return date_time_format($visitor->checkin_at);
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }

    public function getPreRegister($id)
    {

        $pre_registers = PreRegister::where(['employee_id' => $id])->orderBy('id', 'desc')->get();

        return Datatables::of($pre_registers)
            ->addColumn('action', function ($pre_register) {
                return action_button([
                    'view'   => ['route' => route('admin.pre-registers.show', $pre_register), 'permission' => 'pre-registers_show'],
                    'edit'   => ['route' => route('admin.pre-registers.edit', $pre_register), 'permission' => 'pre-registers_edit'],
                    'delete' => ['route' => route('admin.pre-registers.destroy', $pre_register), 'permission' => 'pre-registers_delete'],
                ]);
            })

            ->editColumn('name', function ($pre_register) {
                return Str::limit(optional($pre_register->visitor)->name, 50);
            })
            ->editColumn('email', function ($pre_register) {
                return Str::limit(optional($pre_register->visitor)->email, 50);
            })
            ->editColumn('expected_date', function ($pre_register) {
                return custome_date_format($pre_register->expected_date);
            })
            ->editColumn('expected_time', function ($pre_register) {
                return date('h:i A', strtotime($pre_register->expected_time));
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }
}
