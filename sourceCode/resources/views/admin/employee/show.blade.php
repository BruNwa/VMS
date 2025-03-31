@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('employees/show') }}
            </div>
        </div>
    </div>

    <div class="p-6 mb-8 bg-white shadow-xs rounded-xl">
        <div class="flex flex-wrap gap-4 sm:gap-6">
            <img class="w-[120px] h-[120px] object-cover rounded-lg" src="{{ optional($employee->user)->images }}" alt="avatar">
            <div>
                <h3 class="text-[26px] font-semibold font-client leading-[40px] capitalize">{{ optional($employee->user)->name }}</h3>
                <label class="block w-fit p-0.5 px-2 rounded text-[10px] leading-4 font-medium font-client uppercase text-[#E89806] mb-3 bg-[#FFF5DE]">{{ isset($employee->designation) ? $employee->designation->name : ''}}</label>
                <span class="block text-sm leading-tight font-normal font-client mb-1.5 text-[#6e7191]">{{ $employee->user->email }}</span>
                <span class="text-sm leading-4 font-normal font-client uppercase  text-[#6e7191]">{{ $employee->countryCodeWithPhone }}</span>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-start sm:flex-row sm:items-center gap-1.5 mb-6">
        <button type="button" data-tab="#employee" class="profile-tabBtn active w-full justify-start sm:w-fit inline-flex items-center sm:justify-center gap-2 h-[38px] py-2 px-4 rounded-md text-[#6E7191] stroke-[#6E7191]">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 9C11.0711 9 12.75 7.32107 12.75 5.25C12.75 3.17893 11.0711 1.5 9 1.5C6.92893 1.5 5.25 3.17893 5.25 5.25C5.25 7.32107 6.92893 9 9 9Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.4426 16.5C15.4426 13.5975 12.5551 11.25 9.00011 11.25C5.44511 11.25 2.55762 13.5975 2.55762 16.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="text-sm capitalize">{{ __('all.employee') }}</span>
        </button>
        <button type="button" data-tab="#visitor" class="profile-tabBtn w-full justify-start sm:w-fit inline-flex items-center sm:justify-center gap-2 h-[38px] py-2 px-4 rounded-md text-[#6E7191] stroke-[#6E7191]">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.75 16.5H5.25C2.25 16.5 1.5 15.75 1.5 12.75V11.25C1.5 8.25 2.25 7.5 5.25 7.5H12.75C15.75 7.5 16.5 8.25 16.5 11.25V12.75C16.5 15.75 15.75 16.5 12.75 16.5Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.5 7.5V6C4.5 3.5175 5.25 1.5 9 1.5C12.375 1.5 13.5 3 13.5 5.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 13.875C10.0355 13.875 10.875 13.0355 10.875 12C10.875 10.9645 10.0355 10.125 9 10.125C7.96447 10.125 7.125 10.9645 7.125 12C7.125 13.0355 7.96447 13.875 9 13.875Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="text-sm capitalize">{{ __('all.visitors') }}</span>
        </button>
        <button type="button" data-tab="#preregister" class="profile-tabBtn w-full justify-start sm:w-fit inline-flex items-center sm:justify-center gap-2 h-[38px] py-2 px-4 rounded-md text-[#6E7191] stroke-[#6E7191]">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.00016 10.0726C10.2925 10.0726 11.3402 9.02492 11.3402 7.73258C11.3402 6.44023 10.2925 5.39258 9.00016 5.39258C7.70781 5.39258 6.66016 6.44023 6.66016 7.73258C6.66016 9.02492 7.70781 10.0726 9.00016 10.0726Z" stroke-width="1.5"/>
                <path d="M2.71527 6.3675C4.19277 -0.127498 13.8153 -0.119998 15.2853 6.375C16.1478 10.185 13.7778 13.41 11.7003 15.405C10.1928 16.86 7.80777 16.86 6.29277 15.405C4.22277 13.41 1.85277 10.1775 2.71527 6.3675Z" stroke-width="1.5"/>
            </svg>
            <span class="text-sm capitalize">{{ __('all.pre_register') }}</span>
        </button>
    </div>
    <div id="employee" class="profile-tabDiv active">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.employee_information') }}</h3>
            </div>
            <div class="db-card-body">
                <div class="py-2 row">
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.name') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $employee->user->name }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.phone') }}</span>
                            <span class="db-list-item-text w-full sm:w-1/2">{{ $employee->countryCodeWithPhone }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.email') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $employee->user->email }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.joining_date') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ custome_date_format($employee->date_of_joining) }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.gender') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $employee->mygender }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.department') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ isset($employee->department) ? $employee->department->name : '' }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.designation') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ isset($employee->designation) ? $employee->designation->name : ''}}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.status') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{!! $employee->mystatus !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="visitor" class="profile-tabDiv">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.visitor_informaton') }}</h3>
            </div>
            <div class="col-12">
                <div class="db-table-responsive">
                    <table class="table db-table stripe" id="visitortable" data-url="{{ route('admin.employees.get-visitors',$employee) }}" data-status="{{ \App\Enums\Status::ACTIVE }}" data-hidecolumn="{{ auth()->user()->can('visitors_show') || auth()->user()->can('visitors_edit') || auth()->user()->can('visitors_delete') }}">
                        <thead class="db-table-head">
                            <tr class="db-table-head-tr">
                                <th class="db-table-head-th">{{ __('all.name') }}</th>
                                <th class="db-table-head-th">{{ __('all.email') }}</th>
                                <th class="db-table-head-th">{{ __('all.check_in') }}</th>
                                <th class="db-table-head-th">{{ __('all.actions') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="preregister" class="profile-tabDiv">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.pre_registers_informaton') }}</h3>
            </div>
            <div class="col-12">
                <div class="db-table-responsive">
                    <table class="table db-table stripe" id="preregistertable" data-url="{{ route('admin.employees.get-pre-registers',$employee) }}" data-status="{{ \App\Enums\Status::ACTIVE }}" data-hidecolumn="{{ auth()->user()->can('pre-registers_show') || auth()->user()->can('pre-registers_edit') || auth()->user()->can('pre-registers_delete') }}">
                        <thead class="db-table-head">
                            <tr class="db-table-head-tr">
                                <th class="db-table-head-th">{{ __('all.name') }}</th>
                                <th class="db-table-head-th">{{ __('all.email') }}</th>
                                <th class="db-table-head-th">{{ __('all.expected_date') }}</th>
                                <th class="db-table-head-th">{{ __('all.expected_time') }}</th>
                                <th class="db-table-head-th">{{ __('all.actions') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/datatable/css/dataTables.tailwindcss.css') }}">
@endpush
@push('js')
    <script src="{{ asset('backend/datatable/js/dataTables.js') }}"></script>
    <script src="{{ asset('backend/datatable/js/dataTables.tailwindcss.js') }}"></script>
    <script src="{{ asset('backend/datatable/js/tailwindcss.js') }}"></script>
    <script src="{{ asset('js/employee/view.js') }}"></script>
@endpush
