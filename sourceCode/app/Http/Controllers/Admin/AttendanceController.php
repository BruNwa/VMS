<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BackendController;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AttendanceController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['sitetitle'] = 'Attendance';
        $this->middleware(['permission:attendance'])->only('index');
        $this->middleware(['permission:attendance_delete'])->only('destroy');
//
    }


    public function index(Request $request)
    {
        $attendance = Attendance::where(['user_id'=>auth()->user()->id,'date'=>date('Y-m-d')])->first();

        return view('admin.attendance.index',compact('attendance'));
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete($id);
        return redirect()->route('admin.attendance.index')->withSuccess('The data delete successfully!');
    }

    public function getAttendance()
    {
        $attendances = Attendance::orderBy('id', 'desc')->get();

        return Datatables::of($attendances)
            ->addColumn('action', function ($attendance) {
                return action_button([
                    'delete'    => ['route' => route('admin.attendance.destroy', $attendance), 'permission' => 'attendance_delete'],
                ]);
            })
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
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }

    public function clockIn(Request $request)
    {
        $request->validate([
            'title' =>'nullable|max:100',
        ]);
        $attendance = new Attendance;
        $attendance->title = $request->title??'Office';
        $attendance->checkin_time = date('g:i A');
        $attendance->date = date('Y-m-d');
        $attendance->user_id = auth()->user()->id;
        $attendance->save();
        return redirect()->back()->with('success','Attendance successfully');
    }

    public function clockOut(Request $request)
    {
        $attendance = Attendance::where(['user_id'=>auth()->user()->id,'date'=>date('Y-m-d')])->first();
        if($attendance){
            $attendance->checkout_time	 = date('g:i A');
            $attendance->user_id         = auth()->user()->id;
            $attendance->save();
        }

        return redirect()->back()->with('success','Clock-out successfully');
    }
}
