<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Ask;
use App\Enums\UserRole;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\PreRegister;
use Illuminate\Http\Request;
use App\Models\VisitingDetails;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\BackendController;
use App\Http\Services\Visitor\VisitorService;



class DashboardController extends BackendController
{
    protected $visitorService;

    public function __construct(VisitorService $visitorService)
    {
        parent::__construct();
        $this->data['sitetitle'] = 'Dashboard';
        $this->visitorService = $visitorService;
        $this->middleware(['permission:dashboard'])->only('index');
    }
    public function index()
    {
        $todayAttendance     = 0;
        $employeesAttendance = null;
        if (auth()->user()->getrole->name == 'Employee') {
            $visitors             = VisitingDetails::where(['employee_id' => auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            $preregister          = PreRegister::where(['employee_id' => auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            $totalEmployees       = 0;
            $employeesAttendance = Attendance::where('user_id', auth()->user()->id)
            ->whereDate('date', today())
            ->orderBy('id', 'desc')
            ->first();
            $employeesAttendance = $employeesAttendance->checkin_time ?? 'N/A';
        } else {
            $visitors            = VisitingDetails::orderBy('id', 'desc')->get();
            $preregister         = PreRegister::orderBy('id', 'desc')->get();
            $employees           = Employee::orderBy('id', 'desc')->get();
            $todayAttendance     = Attendance::whereDate('date', today())->orderBy('id', 'desc')->count();

            $totalEmployees  = count($employees);
        }

        $totalVisitor         = count($visitors);
        $totalPrerigister     = count($preregister);

        $attendance                        = Attendance::where(['user_id' => auth()->user()->id, 'date' => date('Y-m-d')])->first();
        $this->data['attendance']          = $attendance;
        $this->data['totalVisitor']        = $totalVisitor;
        $this->data['totalEmployees']      = $totalEmployees;
        $this->data['totalPrerigister']    = $totalPrerigister;
        $this->data['visitors']            = $visitors;
        $this->data['todayAttendance']     = $todayAttendance;
        $this->data['employeesAttendance'] = $employeesAttendance;
        return view('admin.dashboard.index', $this->data);
    }

    public function getTotalPreregister(Request $request)
    {

        $dateWisePreregisterCount = [];
        $dateWise = [];
        $current              = strtotime($request->start);
        $last                 = strtotime($request->end);
        $step                 = '+1 day';

        while ($current <= $last) {
            if (auth()->user()->getrole->id == UserRole::EMPLOYEE) {
                $dateWisePreregisterCount[] = VisitingDetails::with('visitor', function ($query) {
                    $query->where(['is_pre_register' => Ask::YES]);
                })->where(['employee_id' => auth()->user()->employee->id])->whereDate('checkin_at', date('Y-m-d', $current))->count();
            } else {
                $dateWisePreregisterCount[] = VisitingDetails::with('visitor', function ($query) {
                    $query->where(['is_pre_register' => Ask::YES]);
                })->whereDate('checkin_at', date('Y-m-d', $current))->count();
            }
            $dateWise[] = date('d', $current);
            $current = strtotime($step, $current);
        }
        $dateWiseVisitor['dateWisePreregisterCount'] = $dateWisePreregisterCount;
        $dateWiseVisitor['dateWise'] = $dateWise;
        return response()->json($dateWiseVisitor);
    }

    public function getTotalVisitor(Request $request)
    {
        $dateWiseVisitor = [];
        $dateWiseVisitorCount = [];
        $dateWise = [];
        $current              = strtotime($request->start);
        $last                 = strtotime($request->end);
        $step                 = '+1 day';

        while ($current <= $last) {
            if (auth()->user()->getrole->id == UserRole::EMPLOYEE) {
                $dateWiseVisitorCount[] = VisitingDetails::where(['employee_id' => auth()->user()->employee->id])->whereDate('checkin_at', date('Y-m-d', $current))->count();
            } else {
                $dateWiseVisitorCount[] = VisitingDetails::whereDate('checkin_at', date('Y-m-d', $current))->count();
            }
            $dateWise[] = date('d', $current);
            $current = strtotime($step, $current);
        }
        $dateWiseVisitor['dateWiseVisitorCount'] = $dateWiseVisitorCount;
        $dateWiseVisitor['dateWise'] = $dateWise;
        return response()->json($dateWiseVisitor);
    }

    public function getTotalVisitorState(Request $request)
    {
        $dateWiseVisitor   = [];
        $totalVisitorCount = [];
        $dateWise          = [];

        $current = strtotime($request->start);
        $last    = strtotime($request->end);
        $step    = '+1 day';

        while ($current <= $last) {
            $date                = date('Y-m-d', $current);
            $visitorCount        = VisitingDetails::whereDate('checkin_at', $date)->count();
            $preregisterCount =  VisitingDetails::with('visitor', function ($query) {
                $query->where(['is_pre_register' => Ask::YES]);
            })->whereDate('checkin_at', $date)->count();
            $totalVisitorCount[] = $visitorCount + $preregisterCount;
            $dateWise[]          = date('d', $current);
            $current = strtotime($step, $current);
        }
        $dateWiseVisitor['dateWiseVisitorCount'] = $totalVisitorCount;
        $dateWiseVisitor['dateWise']             = $dateWise;
        return response()->json($dateWiseVisitor);
    }


    public function getVisitor()
    {
        $visitingDetails = $this->visitorService->all();

        return Datatables::of($visitingDetails)
            ->addColumn('action', function ($visitingDetail) {
                return action_button([
                    'view'  => ['route' => route('admin.visitors.show', $visitingDetail), 'permission' => 'visitors_show'],
                ]);
            })
            ->editColumn('name', function ($visitingDetail) {
                return \Illuminate\Support\Str::limit(optional($visitingDetail->visitor)->name, 50);
            })
            ->editColumn('visitor_id', function ($visitingDetail) {
                return $visitingDetail->reg_no;
            })
            ->editColumn('employee_id', function ($visitingDetail) {
                return optional($visitingDetail->employee->user)->name;
            })
            ->editColumn('status', function ($visitingDetail) {
                return $visitingDetail->statusName;
            })

            ->editColumn('date', function ($visitingDetail) {
                return $visitingDetail->checkin_at ? date('d-M-Y h:i A', strtotime($visitingDetail->checkin_at)) : 'N/A';
            })
            ->editColumn('checkout', function ($visitingDetail) {
                return $visitingDetail->checkout_at ? date('d-M-Y h:i A', strtotime($visitingDetail->checkout_at)) : 'N/A';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
