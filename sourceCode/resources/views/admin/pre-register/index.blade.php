@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('pre-registers') }}
            </div>
        </div>
        <div class="col-12">
            <div class="db-card">
                <div class="border-none db-card-header">
                    <h3 class="db-card-title">{{ __('all.pre_register_details') }}</h3>
                    <div class="db-card-filter">
                        @can('pre-registers_create')
                            <div class="db-card-filter">
                                <a href="{{ route('admin.pre-registers.create') }}" class="db-btn h-[37px] text-white bg-primary">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    <span> {{ __('all.add_Pre_register') }}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="db-table-responsive">
                    <table class="table db-table stripe" id="maintable" data-url="{{ route('admin.pre-registers.get-pre-registers') }}"
                        data-hidecolumn="">
                        <thead class="db-table-head">
                            <tr class="db-table-head-tr">
                                <th class="db-table-head-th">{{ __('all.name') }}</th>
                                <th class="db-table-head-th">{{ __('all.email') }}</th>
                                <th class="db-table-head-th">{{ __('all.employee') }}</th>
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
<script src="{{ asset('js/preregister/index.js') }}"></script>
@endpush
