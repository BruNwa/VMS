<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Models\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\LanguageRequest;
use PragmaRX\Countries\Package\Countries;
use App\Http\Controllers\BackendController;

class LanguageController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['sitetitle']      = 'Language';
        $this->middleware(['permission:language']);
    }

    public function index()
    {
        return view('admin.setting.language.index');
    }


    public function create()
    {
        return view('admin.setting.language.create');
    }

    public function store(LanguageRequest $request)
    {

        $flag = null;
        $countries = Countries::all();
        foreach ($countries as  $countrie) {
            if (strtolower($countrie['iso_a2']) == strtolower($request->code)) {
                $flag = $countrie['extra']['emoji'];
            }
        }
        $language            = new Language;
        $language->name      = $request->name;
        $language->code      = strtolower($request->code);
        $language->flag_icon = $flag;
        $language->status    = $request->status;
        $language->save();
        return redirect()->route('admin.language.index')->withSuccess('Language created successfully');
    }

    public function edit($id)
    {
        $this->data['language']  = Language::findOrFail($id);
        return view('admin.language.edit', $this->data);
    }

    public function update(LanguageRequest $request, Language $language)
    {
        $flag = null;
        $countries = Countries::all();
        foreach ($countries as  $countrie) {
            if (strtolower($countrie['iso_a2']) == strtolower($request->code)) {
                $flag = $countrie['extra']['emoji'];
            }
        }

        $language->name      = $request->name;
        $language->code      = $request->code;
        $language->flag_icon = $flag;
        $language->status    = $request->status;
        $language->save();
        return redirect()->route('admin.language.index')->withSuccess('Language Updated successfully');
    }

    public function destroy($id)
    {
        Language::findOrFail($id)->delete();
        return redirect(route('admin.language.index'))->withSuccess('The Data Deleted Successfully');
    }

    public function changeStatus($id, $status)
    {
        $language         = Language::findOrFail($id);
        $language->status = $status;
        $language->save();
        return redirect()->route('admin.language.index')->withSuccess('The Status Change successfully!');
    }

    public function getLanguage(Request $request)
    {
        $laguages = Language::all();
        $i            = 1;
        $laguageArray = [];
        if (!blank($laguages)) {
            foreach ($laguages as $laguage) {
                $laguageArray[$i]          = $laguage;
                $laguageArray[$i]['setID'] = $i;
                $i++;
            }
        }
        return Datatables::of($laguageArray)
            ->addColumn('action', function ($laguage) {
                $retAction = [];
                $retAction['edit'] = ['route' => route('admin.language.edit', $laguage),'permission' => 'language_edit'];
                if ($laguage->id != '1' && $laguage->code != setting('locale')) {
                    $retAction['delete'] = ['route' => route('admin.language.destroy', $laguage),'permission' => 'language_delete'];
                }
                return action_button($retAction);
            })
            ->editColumn('name', function ($language) {
                return $language->name;
            })
            ->editColumn('flag', function ($language) {

                return $language->flag_icon == null ? '🇬🇧' : $language->flag_icon;
            })
            ->editColumn('code', function ($language) {
                return strtoupper($language->code);
            })
            ->editColumn('status', function ($language) {
                return ($language->status == 5 ? '<span class="text-green-600 bg-green-100 db-table-badge">' . trans('statuses.' . Status::ACTIVE) : '<span class="text-red-600 bg-red-100 db-table-badge">' . trans('statuses.' . Status::INACTIVE));
            })
            ->editColumn('id', function ($language) {
                return $language->setID;
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }
}
