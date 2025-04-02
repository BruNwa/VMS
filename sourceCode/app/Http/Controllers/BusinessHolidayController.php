<?php

namespace App\Http\Controllers;

use App\Models\BusinessHoliday;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(Auth::user()->isAbleTo('holiday create'))
        {
            $business = Business::find($request->business_id);
            return view('holiday.create',compact('business'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->isAbleTo('holiday create'))
        {
            $validator = \Validator::make(
                $request->all(), [
                    'title' => 'required',
                    'date' => 'required',
                    ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $business = Business::find($request->business_id);

            $businessholiday                   = new BusinessHoliday();
            $businessholiday->title             = $request->title;
            $businessholiday->date             = $request->date;
            $businessholiday->business_id      = !empty($business) ? $business->id : 0;
            $businessholiday->created_by       = creatorId();
            $businessholiday->save();
            $tab = 6;

            return redirect()->back()->with('success', __('Holiday successfully created.'))->with('tab', $tab);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessHoliday $businessHoliday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessHoliday $businessHoliday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessHoliday $businessHoliday)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessHoliday $businessHoliday)
    {
        //
    }
}
