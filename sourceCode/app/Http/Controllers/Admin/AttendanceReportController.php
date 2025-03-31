<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BackendController;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class AttendanceReportController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['sitetitle'] = 'Attendance Report';
        $this->middleware(['permission:attendance-report'])->only('index');
    }

    public function index(Request $request)
    {
        return view('admin.report.attendance.index', $this->data);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $query = Attendance::query();
            if (!empty($request->from_date) && !empty($request->to_date)) {
                $fromDate = date('Y-m-d', strtotime($request->from_date)) . ' 00:00:00';
                $toDate   = date('Y-m-d', strtotime($request->to_date)) . ' 23:59:59';
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }
            $attendances = $query->orderBy('id', 'DESC')->get();
            return Datatables::of($attendances)
                ->editColumn('user', function ($attendance) {
                    return Str::limit(optional($attendance->user)->name, 50);
                })
                ->editColumn('working', function ($attendance) {
                    return Str::limit($attendance->title, 30);
                })
                ->editColumn('date', function ($attendance) {
                    return custome_date_format($attendance->date);
                })
                ->addColumn('clockin', function ($attendance) {
                    if ($attendance->checkin_time) {
                        return time_format($attendance->checkin_time);
                    } else {
                        return 'N/A';
                    }
                })
                ->addColumn('clockout', function ($attendance) {
                    if ($attendance->checkout_time) {
                        return time_format($attendance->checkout_time);
                    } else {
                        return 'N/A';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        }
    }
}
