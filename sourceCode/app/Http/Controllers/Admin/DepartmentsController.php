<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentsRequest;
use App\Http\Controllers\BackendController;

class DepartmentsController extends BackendController
{

    public function __construct(public DepartmentService $departmentService)
    {
        parent::__construct();
        $this->middleware('auth');
        $this->data['sitetitle'] = 'Departments';

        $this->middleware(['permission:departments'])->only('index');
        $this->middleware(['permission:departments_create'])->only('create', 'store');
        $this->middleware(['permission:departments_edit'])->only('edit', 'update');
        $this->middleware(['permission:departments_delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.department.index', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentsRequest $request)
    {
        $input = $request->all();
        Department::create($input);
        return redirect(route('admin.departments.index'))->withSuccess('Departments created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['department']  = Department::findOrFail($id);

        return view('admin.department.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, ['name' => 'required|string|max:255|unique:departments,name,' . $id]);
        $input = $request->all();
        $department = Department::findOrFail($id);
        $department->update($input);

        return redirect(route('admin.departments.index'))->withSuccess('The Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Department::findOrFail($id)->delete();
        return redirect(route('admin.departments.index'))->withSuccess('The Data Deleted Successfully');
    }

    public function list(Request $request)
    {
        if (request()->ajax()) {
            $departments = $this->departmentService->list($request);
            return Datatables::of($departments)
                ->addColumn('action', function ($department) {
                    return action_button([
                        'edit'   => ['route' => route('admin.departments.edit', $department), 'permission' => 'departments_edit'],
                        'delete' => ['route' => route('admin.departments.destroy', $department), 'permission' => 'departments_delete'],
                        'show'   => ['route' => route('admin.departments.show', $department), 'permission' => 'departments_show'],
                    ]);
                })
                ->editColumn('name', function ($department) {
                    return $department->name;
                })
                ->editColumn('status', function ($department) {
                    return $department->statusName;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }
    }
}
