@extends('admin.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="custome-breadcrumb">
            {{ Breadcrumbs::render('attendance') }}
        </div>
    </div>
    <div class="col-12">
        <div class="db-card">
            <div class="border-none db-card-header">
                <h3 class="db-card-title">{{ __('all.attendance') }}</h3>
                <div class="db-card-filter">
                    @if(!blank($attendance))
                    <div class="db-card-filter">
                        @if(!$attendance->checkout_time)
                        <form action="{{ route('admin.attendance.clockout')}}" method="post"> {{ csrf_field() }}
                            <button type="submit" class="db-btn h-[37px] text-white bg-primary">
                                <i class="fa-solid fa-circle-plus"></i>
                                <span> {{ __('all.clock_out') }}</span>
                            </button>
                        </form>
                        @endif
                    </div>
                    @else
                    <div class="db-card-filter">
                        <button type="button" data-modal="#modal-content" class="db-btn h-[38px] text-white bg-primary">
                            <i class="fa-solid fa-circle-plus"></i>
                            {{ __('all.clock_in') }}
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="db-table-responsive">
                <table class="table db-table stripe" id="maintable" data-url="{{ route('admin.attendance.get-attendance') }}" data-hidecolumn="{{ auth()->user()->can('attendance_delete') }}">
                    <thead class="db-table-head">
                        <tr class="db-table-head-tr">
                            <th class="db-table-head-th">{{ __('all.user') }}</th>
                            <th class="db-table-head-th">{{ __('all.working') }}</th>
                            <th class="db-table-head-th">{{ __('all.date') }}</th>
                            <th class="db-table-head-th">{{ __('all.clock_in') }}</th>
                            <th class="db-table-head-th">{{ __('all.clock_out') }}</th>
                            <th class="db-table-head-th">{{ __('all.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>


        </div>
    </div>
</div>
@include('admin.attendance.clockinModal')
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('backend/datatable/css/dataTables.tailwindcss.css') }}">
@endpush

@push('js')
<script src="{{ asset('backend/datatable/js/dataTables.js') }}"></script>
<script src="{{ asset('backend/datatable/js/dataTables.tailwindcss.js') }}"></script>
<script src="{{ asset('backend/datatable/js/tailwindcss.js') }}"></script>
<script src="{{ asset('js/attendance/index.js') }}"></script>
@endpush

