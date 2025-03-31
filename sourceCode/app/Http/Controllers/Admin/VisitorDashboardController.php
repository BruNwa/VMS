<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Enums\Status;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use DateTimeImmutable;
use App\Models\Visitor;
use App\Models\Employee;
use Illuminate\Support\Env;
use Illuminate\Support\Str;
use App\Enums\VisitorStatus;
use Illuminate\Http\Request;
use App\Models\VisitingDetails;
use Yajra\DataTables\DataTables;
use App\Http\Services\SmsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorRequest;
use Illuminate\Support\Facades\Validator;
use App\Notifications\VisitorConfirmation;
use App\Http\Controllers\BackendController;
use App\Http\Services\Visitor\VisitorService;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class VisitorDashboardController extends BackendController
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



    public function checkout(VisitingDetails $visitingDetail)
    {

        $visitingDetail->checkout_at = date('y-m-d H:i');
        $visitingDetail->save();
        return redirect()->route('admin.visitors.index')->withSuccess('Successfully Check-Out!');
    }

    public function changeStatus($id, $status,$dashboard=false)
    {
        $visitor         = VisitingDetails::findOrFail($id);
        $visitor->status = $status;
        $visitor->checkin_at = date('y-m-d H:i');
        $visitor->save();

        try {
            $visitor->visitor->notify(new VisitorConfirmation($visitor));

        } catch (\Exception $e) {

        }

        if($dashboard){
            return redirect()->route('admin.dashboard.index')->withSuccess('The Status Change successfully!');
        }
        return redirect()->route('admin.visitors.index');
    }

    public function visitorDisable($id)
    {
        $visitor         = VisitingDetails::findOrFail($id);
        if (!$visitor->disable) {
            $visitor->disable = true;
        }else{
            $visitor->disable = false;
        }
        $visitor->save();

        return redirect()->back()->withSuccess('Visitor Disable successfully!');
    }
}
