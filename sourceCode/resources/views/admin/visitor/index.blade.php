@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('visitors') }}
            </div>
        </div>
        <div class="col-12">
            <div class="db-card">
                <div class="border-none db-card-header">
                    <h3 class="db-card-title">{{ __('all.visitors_details') }}</h3>
                    <div class="db-card-filter">
                        @can('visitors_create')
                            <div class="db-card-filter">
                                <a href="{{ route('admin.visitors.create') }}" class="db-btn h-[37px] text-white bg-primary">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    <span> {{ __('all.add_visitor') }}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="db-table-responsive">
                    <table class="table table-vcenter" id="maintable"  data-url="{{ route('admin.visitors.get-visitors') }}" data-status="{{ \App\Enums\Status::ACTIVE }}" data-hidecolumn="{{ auth()->user()->can('visitors_show') || auth()->user()->can('visitors_edit') || auth()->user()->can('visitors_delete') }}">
                        <thead class="db-table-head">
                            <tr class="db-table-head-tr">
                                <th class="db-table-head-th">{{ __('all.visitor_id') }}</th>
                                <th class="db-table-head-th">{{ __('all.name') }}</th>
                                <th class="db-table-head-th">{{ __('all.employee') }}</th>
                                <th class="db-table-head-th">{{ __('all.check_in') }}</th>
                                <th class="db-table-head-th">{{ __('all.check_out') }}</th>
                                <th class="db-table-head-th">{{ __('all.status') }}</th>
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
    <script src="{{ asset('js/visitor/index.js') }}"></script>
@endpush



