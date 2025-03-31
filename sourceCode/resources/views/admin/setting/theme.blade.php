@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-theme-setting') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.theme_settings') }}</h3>
        </div>
        <div class="db-card-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.setting.theme-update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-col-12 sm:form-col-6 md:form-col-6">
                        <label class="db-field-title">{{ __('all.site_logo') }}</label>
                        <input type="file" name="site_logo" class="db-field-control @error('site_logo') invalid @enderror">
                        @error('site_logo')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                        <img class="themeImageLogo w-[150px] h-[120px] object-fill rounded-lg mt-2" id="previewImage" src="{{ themeSetting('site_logo') ? themeSetting('site_logo')->logo : asset('images/site_logo.png') }}" alt="{{ __('Visitor pass Logo') }}" />
                    </div>

                    <div class="form-col-12 sm:form-col-6 md:form-col-6">
                        <label class="db-field-title">{{ __('all.fav_icon') }}</label>
                        <input type="file" name="fav_icon" class="db-field-control @error('fav_icon') invalid @enderror">
                        @error('fav_icon')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                        <img class="themeImageFav w-[150px] h-[120px] object-fill rounded-lg mt-2" id="previewImage" src="{{ themeSetting('fav_icon') ? themeSetting('fav_icon')->favicon : asset('images/fav_icon.png') }}" alt="{{ __('visitor pass Fav Icon') }}" />
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
