@extends('admin.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="custome-breadcrumb">
            {{ Breadcrumbs::render('visitor-report') }}
        </div>
    </div>
    <div class="col-12">
        <div class="db-card">
            <div class="db-card-header border-none">
                <h3 class="db-card-title">{{ __('all.visitor_report') }}</h3>
                <div class="db-card-filter">
                    <button class="db-card-filter-btn table-filter-btn">
                        <i class="fa-solid fa-filter"></i>
                        <span>{{ __('all.filter') }}</span>
                    </button>
                    <div class="dropdown-group">
                        <button class="db-card-filter-btn dropdown-btn">
                            <i class="fa-solid fa-file-export"></i>
                            <span>{{ __('all.export') }}</span>
                        </button>
                        <div class="dropdown-list db-card-filter-dropdown-list">
                            <a href="javascript:void(0);" onclick="printDiv('printTableArea')" class="db-card-filter-dropdown-menu">
                                <i class="fa-solid fa-print"></i>{{ __('all.print') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-filter-div">
                <div class="p-4 sm:p-5 mb-5">
                    <div class="row">
                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label class="db-field-title after:hidden">{{ __('all.visitorID') }}</label>
                            <input type="text" name="reg_no" id="reg_no" class="db-field-control" value="">
                        </div>
                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label class="db-field-title after:hidden">{{ __('all.from_date') }}</label>
                            <input type="date" name="from_date" id="from_date" class="db-field-control">
                        </div>
                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label class="db-field-title after:hidden">{{ __('all.to_date') }}</label>
                            <input type="date" name="to_date" id="to_date" class="db-field-control">
                        </div>
                        <div class="col-12">
                            <div class="flex flex-wrap gap-3 mt-4">
                                <button type="button" class="db-btn py-2 text-white bg-primary" id="date-search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <span>{{ __('all.search') }}</span>
                                </button>
                                <button class="db-btn py-2 text-white bg-gray-600" id="clear">
                                    <i class="fa-solid fa-xmark"></i>
                                    <span>{{ __('all.clear') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="printTableArea">
                <div class="db-table-responsive">
                    <table class="db-table stripe" id="maintable" data-url="{{ route('admin.report.visitor.list') }}" data-status="{{ \App\Enums\Status::ACTIVE }}">
                        <thead class="db-table-head">
                            <tr class="db-table-head-tr">
                                <th class="db-table-head-th">{{ __('all.visitor_id') }}</th>
                                <th class="db-table-head-th">{{ __('all.name') }}</th>
                                <th class="db-table-head-th">{{ __('all.email') }}</th>
                                <th class="db-table-head-th">{{ __('all.phone') }}</th>
                                <th class="db-table-head-th">{{ __('all.employee') }}</th>
                                <th class="db-table-head-th">{{ __('all.checkin') }}</th>
                                <th class="db-table-head-th">{{ __('all.check_out') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('backend/datatable/js/dataTables.js') }}"></script>
<script src="{{ asset('backend/datatable/js/dataTables.tailwindcss.js') }}"></script>
<script src="{{ asset('backend/datatable/js/tailwindcss.js') }}"></script>
<script src="{{ asset('js/report/visitor/index.js') }}"></script>
@endpush
