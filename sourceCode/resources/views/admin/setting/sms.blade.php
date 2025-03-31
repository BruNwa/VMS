@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('sms') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.sms_getway') }}</h3>
        </div>
        <div class="db-card-body">
            <form action="{{ route('admin.setting.sms-update') }}" method="POST">
                @csrf
                <input type="hidden" name="settingsms" value="twilio">
                <div class="row">
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.twilio_account_sid') }}</label>
                        <input type="text" name="twilio_account_sid" id="twilio_account_sid" class="db-field-control @error('twilio_account_sid') invalid @enderror" value="{{ old('twilio_account_sid', setting('twilio_account_sid')) }}">
                        @error('twilio_account_sid')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.twilio_auth_token') }}</label>
                        <input type="text" name="twilio_auth_token" id="twilio_auth_token" class="db-field-control @error('twilio_auth_token') invalid @enderror" value="{{ old('twilio_auth_token', setting('twilio_auth_token')) }}">
                        @error('twilio_auth_token')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.twilio_from') }}</label>
                        <input type="text" name="twilio_from" id="twilio_from" class="db-field-control @error('twilio_from') invalid @enderror" value="{{ old('twilio_from', setting('twilio_from')) }}">
                        @error('twilio_from')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.status') }}</label>
                        <div class="db-field-down-arrow">
                            <select name="twilio_disabled" id="twilio_disabled" class="db-field-control appearance-none @error('twilio_disabled') invalid @enderror">
                                <option value="1" {{ (old('twilio_disabled', setting('twilio_disabled')) == 1) ? 'selected' : '' }}> {{ __('Enable') }}</option>
                                <option value="0" {{ (old('twilio_disabled', setting('twilio_disabled')) == 0) ? 'selected' : '' }}> {{ __('Disable') }}</option>
                            </select>
                            @error('twilio_disabled')
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
