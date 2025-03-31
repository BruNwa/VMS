@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-whatsApp-setting') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.whats_app') }}</h3>
        </div>
        <div class="db-card-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.setting.whatsapp-message-update') }}">
                @csrf
                <div class="row">
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title">{{ __('all.accept_message') }}</label>
                        <input type="text" name="whatsapp_accept_message" class="db-field-control @error('whatsapp_accept_message') invalid @enderror" value="{{ old('whatsapp_accept_message', setting('whatsapp_accept_message')) }}">
                        @error('whatsapp_accept_message')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title">{{ __('all.decline_message') }}</label>
                        {{-- <textarea class="db-field-control" name="whatsapp_decline_message" id="editor1">{{setting('whatsapp_decline_message')}}</textarea> --}}
                        <input type="text" name="whatsapp_decline_message" class="db-field-control @error('whatsapp_decline_message') invalid @enderror" value="{{ old('whatsapp_decline_message', setting('whatsapp_decline_message')) }}">
                        @error('whatsapp_decline_message')
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
