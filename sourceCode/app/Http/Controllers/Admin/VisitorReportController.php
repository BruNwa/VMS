<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VisitingDetails;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BackendController;


class VisitorReportController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['sitetitle'] = 'Visitor Report';
        $this->middleware(['permission:admin-visitor-report'])->only('index');
    }

    public function index(Request $request)
    {
        return view('admin.report.visitor.index', $this->data);
    }

    public function list(Request $request)
    {
        if (request()->ajax()) {
            $query = VisitingDetails::query();
            if ($request->reg_no) {
                $query->where('reg_no', $request->reg_no);
            }

            if (!empty($request->from_date) && !empty($request->to_date)) {
                $fromDate = date('Y-m-d', strtotime($request->from_date)) . ' 00:00:00';
                $toDate   = date('Y-m-d', strtotime($request->to_date)) . ' 23:59:59';
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }
            $visitors = $query->orderBy('id', 'DESC')->get();
            return datatables::of($visitors)
                ->editColumn('visitorID', function ($visitor) {
                    return $visitor->reg_no;
                })
                ->editColumn('name', function ($visitor) {
                    return Str::limit(optional($visitor->visitor)->name, 50);
                })
                ->editColumn('email', function ($visitor) {
                    return Str::limit(optional($visitor->visitor)->email, 50);
                })
                ->editColumn('phone', function ($visitor) {
                    return optional($visitor->visitor)->CountryCodeWithPhone;
                })
                ->editColumn('employee', function ($visitor) {
                    return optional($visitor->employee->user)->name;
                })
                ->editColumn('checkin', function ($visitor) {
                    return date_time_format($visitor->checkin_at);
                })
                ->editColumn('check_out', function ($visitor) {
                    return date_time_format($visitor->checkout_at);
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }
    }
}
