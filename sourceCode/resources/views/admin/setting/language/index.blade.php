@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-language') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
     
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="border-none db-card-header">
            <h3 class="db-card-title">{{ __('all.language_details') }}</h3>
            <div class="db-card-filter">
                @can('language_create')
                    <a href="{{ route('admin.language.create') }}" class="db-btn h-[38px] text-white bg-primary">
                        <i class="fa-solid fa-circle-check"></i> {{ __('all.add_language') }}</a>
                @endcan
                <a href="{{ url('translations') }}" target="_blank" class="db-btn h-[38px] text-white bg-primary">
                    <i class="fa-solid fa-circle-check"></i>{{ __('all.translate') }}</a>
            </div>
        </div>
        <div class="db-table-responsive">
            <table class="table db-table stripe" id="maintable" data-url="{{ route('admin.language.get-language') }}" data-status="{{ \App\Enums\Status::ACTIVE }}">
                <thead class="db-table-head">
                    <tr class="db-table-head-tr">
                        <th class="db-table-head-th">{{ __('all.language_name') }}</th>
                        <th class="db-table-head-th">{{ __('all.flag') }}</th>
                        <th class="db-table-head-th">{{ __('all.code') }}</th>
                        <th class="db-table-head-th">{{ __('all.status') }}</th>
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
    <script src="{{ asset('js/language/index.js') }}"></script>
@endpush
