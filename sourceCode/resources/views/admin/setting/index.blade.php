@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                <div class="page-header">
                    @yield('admin.setting.breadcrumbs')
                </div>
            </div>
        </div>
        <div class="col-12 md:col-4 xl:col-3">
            <div class="db-card">
                <div class="h-0 overflow-hidden transition-all duration-300 md:h-auto md:overflow-auto">
                    <nav class="p-3">
                        <a href="{{ route('admin.setting.index') }}" class="db-tab-btn {{ (request()->is('admin/setting')) ? 'active' : '' }}"><i class="fa-solid fa-globe"></i>{{ __('all.site') }}</a>
                        <a href="{{ route('admin.setting.sms') }}" class="db-tab-btn {{ (request()->is('admin/setting/sms')) ? 'active' : '' }}"><i class="fa-solid fa-comment-sms"></i>{{ __('all.sms_getway') }}</a>
                        <a href="{{ route('admin.setting.fcm') }}" class="db-tab-btn {{ (request()->is('admin/setting/fcm-notification')) ? 'active' : '' }}"><i class="fa-regular fa-bell"></i>{{ __('all.notification') }}</a>
                        <a href="{{ route('admin.setting.email') }}" class="db-tab-btn {{ (request()->is('admin/setting/email')) ? 'active' : '' }}"><i class="fa-regular fa-envelope"></i>{{ __('all.mail') }}</a>
                        <a href="{{ route('admin.setting.email-template') }}" class="db-tab-btn {{ (request()->is('admin/setting/emailtemplate')) ? 'active' : '' }}"><i class="fa-solid fa-envelope-open"></i>{{ __('all.template') }}</a>
                        <a href="{{ route('admin.setting.homepage') }}" class="db-tab-btn {{ (request()->is('admin/setting/homepage')) ? 'active' : '' }}"><i class="fa-solid fa-brush"></i>{{ __('all.front_end') }}</a>
                        <a href="{{ route('admin.setting.whatsapp-message') }}" class="db-tab-btn {{ (request()->is('admin/setting/whatsapp')) ? 'active' : '' }}"><i class="fa-brands fa-whatsapp"></i>{{ __('all.whats_app') }}</a>
                        <a href="{{ route('admin.language.index') }}" class="db-tab-btn {{ (request()->is('admin/language')) ? 'active' : '' }}"><i class="fa-regular fa-flag"></i>{{ __('all.language') }}</a>
                        <a href="{{ route('admin.role.index') }}" class="db-tab-btn {{ (request()->is('admin/role')) ? 'active' : '' }}"><i class="fa-solid fa-key"></i>{{ __('all.role_permission') }}</a>
                        <a href="{{ route('admin.setting.page') }}" class="db-tab-btn {{ (request()->is('admin/setting/page')) ? 'active' : '' }}"><i class="fa-regular fa-folder"></i>{{ __('all.page') }}</a>
                        <a href="{{ route('admin.setting.theme') }}" class="db-tab-btn {{ (request()->is('admin/setting/theme')) ? 'active' : '' }}"><i class="fa-solid fa-brush"></i>{{ __('all.theme_settings') }}</a>
                    </nav>
                </div>
            </div>
        </div>
        @yield('admin.setting.layout')
    </div>
@endsection
