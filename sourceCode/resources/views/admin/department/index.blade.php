@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('departments') }}
            </div>
        </div>
        <div class="col-12">
            <div class="db-card">
                <div class="border-none db-card-header">
                    <h3 class="db-card-title">{{ __('all.departments_details') }}</h3>
                    <div class="db-card-filter">
                        @can('departments_create')
                            <div class="db-card-filter">
                                <a href="{{ route('admin.departments.create') }}" class="db-btn h-[37px] text-white bg-primary">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    <span> {{ __('all.add_department') }}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="db-table-responsive">
                    <table class="table db-table stripe" id="maintable" data-url="{{ route('admin.departments.list') }}" data-status="{{ \App\Enums\Status::ACTIVE }}" data-hidecolumn="{{ auth()->user()->can('designations_edit') || auth()->user()->can('designations_delete') }}">
                        <thead class="db-table-head">
                            <tr class="db-table-head-tr">
                                <th class="db-table-head-th">{{ __('all.name') }}</th>
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
    <script src="{{ asset('js/department/index.js') }}"></script>
@endpush
