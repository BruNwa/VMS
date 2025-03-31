@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-email-setting') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.mail') }}</h3>
        </div>
        <div class="db-card-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.setting.email-update') }}">
                @csrf
                <div class="row">
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.mail_host') }}</label>
                        <input type="text" name="mail_host" id="mail_host" class="db-field-control @error('mail_host') invalid @enderror" value="{{ old('mail_host', setting('mail_host')) }}">
                        @error('mail_host')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.mail_port') }}</label>
                        <input type="text" name="mail_port" id="mail_port" class="db-field-control @error('mail_port') invalid @enderror" value="{{ old('mail_port', setting('mail_port')) }}">
                        @error('mail_port')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.mail_username') }}</label>
                        <input type="text" name="mail_username" id="mail_username" class="db-field-control @error('mail_username') invalid @enderror" value="{{ old('mail_username', setting('mail_username')) }}">
                        @error('mail_username')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.mail_password') }}</label>
                        <input type="text" name="mail_password" id="mail_password" class="db-field-control @error('mail_password') invalid @enderror" value="{{ old('mail_password', setting('mail_password')) }}">
                        @error('mail_password')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.mail_from_name') }}</label>
                        <input type="text" name="mail_from_name" id="mail_from_name" class="db-field-control @error('mail_from_name') invalid @enderror" value="{{ old('mail_from_name', setting('mail_from_name')) }}">
                        @error('mail_from_name')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.mail_from_address') }}</label>
                        <input type="text" name="mail_from_address" id="mail_from_address" class="db-field-control @error('mail_from_address') invalid @enderror" value="{{ old('mail_from_address', setting('mail_from_address')) }}">
                        @error('mail_from_address')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.status') }}</label>
                        <div class="db-field-down-arrow">
                            <select name="mail_disabled" id="mail_disabled" class="db-field-control appearance-none @error('mail_disabled') is-invalid @enderror">
                                <option value="1" {{ (old('mail_disabled', setting('mail_disabled')) == 1) ? 'selected' : '' }}> {{ __('all.enable') }}</option>
                                <option value="0" {{ (old('mail_disabled', setting('mail_disabled')) == 0) ? 'selected' : '' }}> {{ __('all.disable') }}</option>
                            </select>
                            @error('mail_disabled')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
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
