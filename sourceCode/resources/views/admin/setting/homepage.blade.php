@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-front-end-setting') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
    <div class="col-12 md:col-8 xl:col-9">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.front_end') }}</h3>
            </div>
            <div class="db-card-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.setting.homepage-update') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 sm:col-6">
                            <label class="db-field-title required">{{ __('all.title') }}</label>
                            <input type="text" name="site_description" id="site_description" class="db-field-control @error('site_description') invalid @enderror" value="{{ old('site_description', setting('site_description')) }}">
                            @error('site_description')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 sm:col-6">
                            <label class="db-field-title">{{ __('all.sub_title') }}</label>
                            <input type="text" name="welcome_screen" class="db-field-control @error('welcome_screen') invalid @enderror" value="{{ old('welcome_screen', setting('welcome_screen')) }}">
                            @error('welcome_screen')
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
