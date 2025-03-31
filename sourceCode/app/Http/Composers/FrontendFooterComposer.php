<?php

namespace App\Http\Composers;

use App\Enums\Status;
use Setting;
use App\Models\Language;
use Illuminate\View\View;
use App\Models\Attendance;

class FrontendFooterComposer
{
    public function compose(View $view)
    {
        $view->with('footermenus', null);
        $view->with('language', Language::where('status', Status::ACTIVE)->get());
        $view->with('sitetitle', Setting::get('site_name'));
        if(auth()->check())
        {
            $view->with('attendance', Attendance::where(['user_id' => auth()->user()->id, 'date' => date('Y-m-d')])->first());
        }
    }
}
