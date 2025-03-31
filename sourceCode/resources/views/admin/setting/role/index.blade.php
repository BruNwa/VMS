@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-role') }}
            </div>
        </div>
    </div>
@endsection
@section('admin.setting.layout')




<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="border-none db-card-header">
            <h3 class="db-card-title">{{ __('all.roles_details') }}</h3>
            <div class="db-card-filter">
                <a href="{{ route('admin.role.create') }}" class="db-btn h-[37px] text-white bg-primary">
                    <i class="fa-solid fa-circle-plus"></i>
                    <span> {{ __('all.add_role') }}</span>
                </a>
            </div>
        </div>
        <div class="db-table-responsive">
                <table class="table db-table stripe" id="maintable"  data-url="{{ route('admin.roles.get-roles') }}" data-status="{{ \App\Enums\Status::ACTIVE }}" data-hidecolumn="{{ (auth()->user()->can('role_show') || auth()->user()->can('role_edit') || auth()->user()->can('role_delete')) }}">
                <thead class="db-table-head">
                    <tr class="db-table-head-tr">
                        <th class="db-table-head-th">{{ __('all.name') }}</th>
                        <th class="db-table-head-th">{{ __('all.actions') }}</th>
                    </tr>
                </thead>
            </table>
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
    <script src="{{ asset('js/role/index.js') }}"></script>
@endpush

