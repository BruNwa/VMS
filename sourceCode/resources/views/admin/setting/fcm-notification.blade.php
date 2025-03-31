@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('fcm_settings') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.notification') }}</h3>
        </div>
        <div class="db-card-body">
            <form action="{{ route('admin.setting.fcm-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_public_vpaid') }}</label>
                        <input type="text" name="fcm_secret_key" id="fcm_secret_key" class="db-field-control @error('fcm_secret_key') invalid @enderror" value="{{ old('fcm_secret_key', setting('fcm_secret_key')) }}">
                        @error('fcm_secret_key')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_api_key') }}</label>
                        <input type="text" name="apiKey" id="apiKey" class="db-field-control @error('apiKey') invalid @enderror" value="{{ old('apiKey', setting('apiKey')) }}">
                        @error('apiKey')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_auth_domain') }}</label>
                        <input type="text" name="authDomain" id="authDomain" class="db-field-control @error('authDomain') invalid @enderror" value="{{ old('authDomain', setting('authDomain')) }}">
                        @error('authDomain')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_project_id') }}</label>
                        <input type="text" name="projectId" id="projectId" class="db-field-control @error('projectId') invalid @enderror" value="{{ old('projectId', setting('projectId')) }}">
                        @error('projectId')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_storage_bucket') }}</label>
                        <input type="text" name="storageBucket" id="storageBucket" class="db-field-control @error('storageBucket') invalid @enderror" value="{{ old('storageBucket', setting('storageBucket')) }}">
                        @error('storageBucket')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_message_sender_id') }}</label>
                        <input type="text" name="messagingSenderId" id="messagingSenderId" class="db-field-control @error('messagingSenderId') invalid @enderror" value="{{ old('messagingSenderId', setting('messagingSenderId')) }}">
                        @error('messagingSenderId')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_app_id') }}</label>
                        <input type="text" name="appId" id="appId" class="db-field-control @error('appId') invalid @enderror" value="{{ old('appId', setting('appId')) }}">
                        @error('appId')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.firebase_measurement_id') }}</label>
                        <input type="text" name="measurementId" id="measurementId" class="db-field-control @error('measurementId') invalid @enderror" value="{{ old('measurementId', setting('measurementId')) }}">
                        @error('measurementId')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-col-12 sm:form-col-6 md:form-col-6">
                        <label class="db-field-title required">{{ __('all.file_json') }}</label>
                        <input type="file" name="private_key" id="private_key" accept=".json" class="db-field-control @error('private_key') invalid @enderror">
                        @error('private_key')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
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
