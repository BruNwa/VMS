<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Models\Employee;
use App\Models\PreRegister;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PreRegisterRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Services\PreRegister\PreRegisterService;
use App\Http\Controllers\BackendController;

class PreRegisterController extends BackendController
{
    protected $preRegisterService;

    public function __construct(PreRegisterService $preRegisterService)
    {
        $this->preRegisterService = $preRegisterService;

        $this->middleware('auth');
        $this->data['sitetitle'] = 'Pre-registers';
        $this->middleware(['permission:pre-registers'])->only('index');
        $this->middleware(['permission:pre-registers_create'])->only('create', 'store');
        $this->middleware(['permission:pre-registers_edit'])->only('edit', 'update');
        $this->middleware(['permission:pre-registers_delete'])->only('destroy');
        $this->middleware(['permission:pre-registers_show'])->only('show');

    }

    public function index(Request $request)
    {

        return view('admin.pre-register.index');
    }

    public function create(Request $request)
    {
        if(auth()->user()->getrole->name == 'Employee') {
            $this->data['employees'] = Employee::where(['status'=>Status::ACTIVE,'id'=>auth()->user()->employee->id])->get();
        }else {
            $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();
        }

        return view('admin.pre-register.create', $this->data);
    }

    public function store(PreRegisterRequest $request)
    {
        $preRegister = $this->preRegisterService->make($request);

        if (setting('whatsapp_message')) {
            return redirect()->route('admin.pre-registers.show',$preRegister->id);
        }

        return redirect()->route('admin.pre-registers.index')->withSuccess('The data inserted successfully!');
    }

    public function show($id)
    {
        $this->data['preregister'] = $this->preRegisterService->find($id);
        if($this->data['preregister']){
            return view('admin.pre-register.show', $this->data);
        }else {
            return redirect()->route('admin.pre-registers.index');
        }
    }

    public function edit($id)
    {
        if(auth()->user()->getrole->name == 'Employee') {
            $this->data['employees'] = Employee::where(['status'=>Status::ACTIVE,'id'=>auth()->user()->employee->id])->get();
        }else {
            $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();
        }
        $this->data['preregister'] = $this->preRegisterService->find($id);
        if($this->data['preregister']){
            return view('admin.pre-register.edit', $this->data);
        }else {
            return redirect()->route('admin.pre-registers.index');
        }
    }

    public function update(PreRegisterRequest $request,PreRegister $preRegister)
    {
        $this->preRegisterService->update($request,$preRegister->id);
        return redirect()->route('admin.pre-registers.index')->withSuccess('The data updated successfully!');
    }

    public function destroy($id)
    {
        $this->preRegisterService->delete($id);
        return redirect()->route('admin.pre-registers.index')->withSuccess('The data delete successfully!');
    }

    public function getPreRegister(Request $request)
    {
        $pre_registers = $this->preRegisterService->all($request);
        return Datatables::of($pre_registers)
            ->addColumn('action', function ($pre_register) {
                return action_button([
                    'view'      => ['route' => route('admin.pre-registers.show', $pre_register), 'permission' => 'pre-registers_show'],
                    'edit'      => ['route' => route('admin.pre-registers.edit', $pre_register), 'permission' => 'pre-registers_edit'],
                    'delete'    => ['route' => route('admin.pre-registers.destroy', $pre_register), 'permission' => 'pre-registers_delete'],
                ]);
            })
            ->editColumn('name', function ($pre_register) {
                return Str::limit(optional($pre_register->visitor)->name, 50);
            })
            ->editColumn('email', function ($pre_register) {
                return Str::limit(optional($pre_register->visitor)->email, 50);
            })
            ->editColumn('employee_id', function ($pre_register) {
                return optional($pre_register->employee->user)->name;
            })
            ->editColumn('expected_date', function ($pre_register) {

                return custome_date_format($pre_register->expected_date);
            })
            ->editColumn('expected_time', function ($pre_register) {
                return time_format($pre_register->expected_time);
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }
}
