@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-language-create') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.language') }}</h3>
        </div>
        <div class="db-card-body">
            <form action="{{ route('admin.language.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required">{{ __('all.language_name') }}</label>
                        <input type="text" name="name" class="db-field-control @error('name') invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required">{{ __('all.code') }}</label>
                        <input type="text" name="code" class="db-field-control @error('code') invalid @enderror" value="{{ old('code') }}">
                        @error('code')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required">{{ __('all.status') }}</label>
                        <div class="db-field-down-arrow">
                            <select name="status" class="db-field-control appearance-none @error('status') invalid @enderror">
                                @foreach(trans('statuses') as $key => $status)
                                    <option value="{{ $key }}" {{ (old('status') == $key) ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('status')
                        <small class="db-field-alert">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-col-12">
                        <button class="text-white db-btn bg-primary">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>{{ __('all.button') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
