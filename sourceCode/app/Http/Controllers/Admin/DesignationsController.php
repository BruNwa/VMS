<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DesignationsRequest;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\BackendController;
use App\Services\DesignationService;
use Exception;

class DesignationsController extends BackendController
{
    public function __construct(public DesignationService $designationService)
    {
        parent::__construct();
        $this->middleware('auth');
        $this->data['sitetitle'] = 'Designations';

        $this->middleware(['permission:designations'])->only('index');
        $this->middleware(['permission:designations_create'])->only('create', 'store');
        $this->middleware(['permission:designations_edit'])->only('edit', 'update');
        $this->middleware(['permission:designations_delete'])->only('destroy');
    }

    public function index()
    {
        return view('admin.designation.index', $this->data);
    }

    public function create()
    {
        return view('admin.designation.create', $this->data);
    }

    public function store(DesignationsRequest $request)
    {
        try{
            $this->designationService->store($request);
            return redirect()->route('admin.designations.index')->withSuccess('Data Created Successfully');
        }catch(Exception $e){
            return redirect()->route('admin.designations.index')->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $this->data['designation']  = Designation::findOrFail($id);
        return view('admin.designation.edit', $this->data);
    }
    

    public function update(DesignationsRequest $request, Designation $designation)
    {
        try{
            $this->designationService->update($request,$designation);
            return redirect(route('admin.designations.index'))->withSuccess('Data Updated Successfully');
        }catch(Exception $e){
            return redirect(route('admin.designations.index'))->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        Designation::findOrFail($id)->delete();
        return redirect(route('admin.designations.index'))->withSuccess('The Data Deleted Successfully');
    }

    public function list(Request $request)
    {
        if (request()->ajax()) {
            $designations = $this->designationService->list($request);

            return Datatables::of($designations)
                ->addColumn('action', function ($designation) {
                    return action_button([
                        'edit'   => ['route' => route('admin.designations.edit', $designation),'permission' => 'designations_edit'],
                        'delete' => ['route' => route('admin.designations.destroy', $designation),'permission' => 'designations_delete'],
                    ]);
                })
                ->editColumn('name', function ($designation) {
                    return $designation->name;
                })
                ->editColumn('status', function ($designation) {
                    return $designation->statusName;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }
    }

}
