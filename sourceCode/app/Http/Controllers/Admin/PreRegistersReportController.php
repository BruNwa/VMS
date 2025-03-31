<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BackendController;
use App\Models\PreRegister;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class PreRegistersReportController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['sitetitle'] = 'PreRegisters Report';

        $this->middleware(['permission:admin-pre-registers-report'])->only('index');
    }

    public function index(Request $request)
    {
        return view('admin.report.pre-register.index', $this->data);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $query = PreRegister::query();

            if (!empty($request->from_date) && !empty($request->to_date)) {
                $fromDate = date('Y-m-d', strtotime($request->from_date)) . ' 00:00:00';
                $toDate   = date('Y-m-d', strtotime($request->to_date)) . ' 23:59:59';
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }
            $pre_registers = $query->orderBy('id', 'DESC')->get();

            return DataTables::of($pre_registers)

                ->editColumn('name', function ($pre_register) {
                    return Str::limit(optional($pre_register->visitor)->name, 50);
                })
                ->editColumn('email', function ($pre_register) {
                    return Str::limit(optional($pre_register->visitor)->email, 50);
                })
                ->editColumn('phone', function ($pre_register) {
                    return optional($pre_register->visitor)->CountryCodeWithPhone;
                })
                ->editColumn('employee', function ($pre_register) {
                    return optional($pre_register->employee->user)->name;
                })
                ->editColumn('expected_date', function ($pre_register) {
                    return custome_date_format($pre_register->expected_date);
                })
                ->editColumn('expected_time', function ($pre_register) {
                    return time_format($pre_register->expected_time);
                })
                ->rawColumns(['pre-registerID', 'name', 'email', 'phone', 'expected_date', 'expected_time'])
                ->make(true);
        }
    }
}
