<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Models\Visitor;
use App\Models\Employee;
use Illuminate\Support\Str;
use App\Enums\VisitorStatus;
use Illuminate\Http\Request;
use App\Models\VisitingDetails;
use App\Http\Requests\VisitorRequest;
use Illuminate\Support\Facades\Validator;
use App\Notifications\VisitorConfirmation;
use App\Http\Controllers\BackendController;
use App\Http\Services\Visitor\VisitorService;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Yajra\DataTables\DataTables;

class VisitorController extends BackendController
{
    protected $visitorService;

    public function __construct(VisitorService $visitorService)
    {
        parent::__construct();
        $this->visitorService = $visitorService;
        $this->middleware('auth');
        $this->data['sitetitle'] = 'Visitors';

        $this->middleware(['permission:visitors'])->only('index');
        $this->middleware(['permission:visitors_create'])->only('create', 'store');
        $this->middleware(['permission:visitors_edit'])->only('edit', 'update');
        $this->middleware(['permission:visitors_delete'])->only('destroy');
        $this->middleware(['permission:visitors_show'])->only('show');
    }

    public function index(Request $request)
    {
        return view('admin.visitor.index');
    }

    public function create(Request $request)
    {

        $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();

        return view('admin.visitor.create', $this->data);
    }

    public function store(VisitorRequest $request)
    {
        $visitingDetail = $this->visitorService->make($request);
        $imageUrl = 'app/public' . str_replace(asset('storage'), "", $visitingDetail->images);
        try {
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize(storage_path($imageUrl));
        } catch (\Exception $e) {
        }

        if (setting('whatsapp_message')) {
            return redirect()->route('admin.visitors.show', $visitingDetail->id);
        }

        return redirect()->route('admin.visitors.index')->withSuccess('The data inserted successfully!');
    }

    public function show($id)
    {
        $this->data['visitingDetails'] = $this->visitorService->find($id);
        if ($this->data['visitingDetails']) {
            return view('admin.visitor.show', $this->data);
        } else {
            return redirect()->route('admin.visitors.index');
        }
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'visitorID' => 'required|numeric',
        ], [
            'visitorID.required' => 'Visitor ID required',
            'visitorID.numeric' => 'ID must be numeric'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.visitors.index'))->withError($validator->errors()->first('visitorID'));
        };

        $id = $request->visitorID;

        $visitingDetail = VisitingDetails::where('reg_no', $id)->first();
        if ($visitingDetail && (!$visitingDetail->checkout_at)) {
            $visitingDetail->checkout_at = date('y-m-d H:i');
            $visitingDetail->save();
            return redirect()->route('admin.visitors.index')->withSuccess('Successfully Checked-Out!');
        } elseif (!$visitingDetail) {
            return redirect()->route('admin.visitors.index')->withError('ID not found');
        } else {

            return redirect()->route('admin.visitors.index')->withError('Already Checked-Out!');
        }
    }

    public function edit($id)
    {
        $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();
        $this->data['visitingDetails'] = $this->visitorService->find($id);
        if ($this->data['visitingDetails']) {
            return view('admin.visitor.edit', $this->data);
        } else {
            return redirect()->route('admin.visitors.index');
        }
    }

    public function update(VisitorRequest $request, VisitingDetails $visitor)
    {
        $visitingDetail = $this->visitorService->update($request, $visitor->id);
        $imageUrl = 'app/public' . str_replace(asset('storage'), "", $visitingDetail->images);
        try {
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize(storage_path($imageUrl));
        } catch (\Exception $e) {
        }
        return redirect()->route('admin.visitors.index')->withSuccess('The data updated successfully!');
    }

    public function destroy($id)
    {
        $this->visitorService->delete($id);
        return redirect()->route('admin.visitors.index')->withSuccess('The data delete successfully!');
    }

    public function getVisitor()
    {
        $visitingDetails = $this->visitorService->all();
        return Datatables::of($visitingDetails)
            ->addColumn('action', function ($visitingDetail) {
                $buttons = [];

                if (!$visitingDetail->checkout_at && $visitingDetail->status == VisitorStatus::ACCEPT) {
                    $buttons['visitor_checkout'] = [
                        'route' => route('admin.visitors.checkout', $visitingDetail),
                        'permission' => 'visitors_edit'
                    ];
                }
                if ($visitingDetail->disable) {
                    $buttons['visitor_unblock'] = [
                        'route' => route('admin.visitors.unblock', $visitingDetail->id),
                        'permission' => 'visitors_edit'
                    ];
                } else {
                    $buttons['visitor_disable'] = [
                        'route' => route('admin.visitors.disable', $visitingDetail->id),
                        'permission' => 'visitors_edit'
                    ];
                }
                $buttons['view'] = [
                    'route' => route('admin.visitors.show', $visitingDetail),
                    'permission' => 'visitors_show'
                ];
                $buttons['edit'] = [
                    'route' => route('admin.visitors.edit', $visitingDetail),
                    'permission' => 'visitors_edit'
                ];
                $buttons['delete'] = [
                    'route' => route('admin.visitors.destroy', $visitingDetail),
                    'permission' => 'visitors_delete'
                ];

                return action_button($buttons);
            })
            ->editColumn('name', function ($visitingDetail) {
                return Str::limit(optional($visitingDetail->visitor)->name, 50);
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

    public function checkout(VisitingDetails $visitingDetail)
    {

        $visitingDetail->checkout_at = date('y-m-d H:i');
        $visitingDetail->save();
        return redirect()->route('admin.visitors.index')->withSuccess('Successfully Check-Out!');
    }

    public function changeStatus($id, $status, $dashboard = false)
    {

        $visitor         = VisitingDetails::findOrFail($id);
        $visitor->status = $status;
        $visitor->checkin_at = date('y-m-d H:i');
        $visitor->save();

        try {
            $visitor->visitor->notify(new VisitorConfirmation($visitor));
        } catch (\Exception $e) {
        }

        if ($dashboard) {
            return redirect()->route('admin.dashboard.index')->withSuccess('The Status Change successfully!');
        }
        return redirect()->route('admin.visitors.index');
    }

    public function visitorDisable($id)
    {
        $visitor         = VisitingDetails::findOrFail($id);
        if (!$visitor->disable) {
            $visitor->disable = true;
        } else {
            $visitor->disable = false;
        }
        $visitor->save();

        return redirect()->back()->withSuccess('Visitor Disable successfully!');
    }


    public function visitorUnblock($id)
    {
        try {
            $visitor         = VisitingDetails::findOrFail($id);
            if (!$visitor->disable) {
                $visitor->disable = true;
            } else {
                $visitor->disable = false;
            }
            $visitor->save();
            return redirect()->back()->withSuccess('Visitor Unblock successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.visitors.index')->withErrors($e->getMessage());
        }
    }
}
