@extends('layouts.main')
@section('page-title')
    {{ __('Subscription Setting') }}
@endsection
@section('page-breadcrumb')
    {{ __('Subscription Setting') }}
@endsection
@section('page-action')
    <div>
        <div class="button-tab-wrapper">
            <div class="create-packge-tab">
                <label for="plan_package">
                    <h5>{{ __('Create Package') }}</h5>
                </label>
                <div class="form-check form-switch custom-switch-v1 float-end">
                    <input type="checkbox" name="plan_package" class="form-check-input input-primary pointer" id="plan_package"
                        {{ admin_setting('plan_package') == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="plan_package"></label>
                </div>
            </div>
            <div class="custome-design-tab">
                <label for="custome_package">
                    <h5>{{ __('Custom Design Package') }}</h5>
                </label>
                <div class="form-check form-switch custom-switch-v1 float-end">
                    <input type="checkbox" name="custome_package" class="form-check-input input-primary pointer"
                        id="custome_package" {{ admin_setting('custome_package') == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="custome_package"></label>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card package-main-wrp">
                <div class="card-body">

                    @if (admin_setting('custome_package') == 'on' && admin_setting('plan_package') == 'on')
                            <div
                                class="package-card-inner  d-flex align-items-center justify-content-center my-3">
                                <div class="tab-main-div">
                                    <div class="nav-pills">
                                        <a class="nav-link  p-2" href="{{ route('plan.list') }}" role="tab"
                                            aria-controls="pills-home"
                                            aria-selected="true">{{ __('Pre-Packaged Subscription') }}</a>
                                    </div>
                                    <div class="nav-pills">
                                        <a class="nav-link active  p-2" href="{{ route('plans.index') }}" role="tab"
                                            aria-controls="pills-home"
                                            aria-selected="true">{{ __('Usage Subscription') }}</a>
                                    </div>
                                </div>
                            </div>
                    @endif
                    @if (admin_setting('custome_package') == 'on')
                        <div class=" col-12">
                            <div class="card">
                                {{ Form::open(['url' => 'plans']) }}
                                <div
                                    class="card-body package-card-inner custome-packge-wrapper subscription-packge-wrapper  d-flex align-items-center gap-3  justify-content-between">
                                    <div class="package-left">
                                        <div class="package-itm theme-avtar badge p-2 px-3 border border-secondary">
                                            <img src="{{ !empty(admin_setting('favicon')) && check_file(admin_setting('favicon')) ? get_file(admin_setting('favicon')) : get_file('uploads/logo/favicon.png') }}{{ '?' . time() }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="package-right d-flex align-items-center flex-wrap">
                                        <div class="package-itm ">
                                            {{ Form::label('package_price_monthly', __('Basic Package Price/Month') . ' ( ' . admin_setting('defult_currancy_symbol') . ' )', ['class' => 'form-label']) }}
                                            {{ Form::number('package_price_monthly', !empty($plan) ? $plan->package_price_monthly : null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Price/month'), 'step' => '0.1', 'min' => '0']) }}
                                        </div>
                                        <div class="package-itm ">
                                            {{ Form::label('package_price_yearly', __('Basic Package Price/Year') . ' ( ' . admin_setting('defult_currancy_symbol') . ' )', ['class' => 'form-label']) }}
                                            {{ Form::number('package_price_yearly', !empty($plan) ? $plan->package_price_yearly : null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Price/Yearly'), 'step' => '0.1', 'min' => '0']) }}
                                        </div>
                                        <div class="package-itm ">
                                            {{ Form::label('price_per_user_monthly', __('Per User Price/Month') . ' ( ' . admin_setting('defult_currancy_symbol') . ' )', ['class' => 'form-label']) }}
                                            {{ Form::number('price_per_user_monthly', !empty($plan) ? $plan->price_per_user_monthly : null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Price Per User'), 'step' => '0.1', 'min' => '0']) }}
                                        </div>
                                        <div class="package-itm ">
                                            {{ Form::label('price_per_user_yearly', __('Per User Price/Year') . ' ( ' . admin_setting('defult_currancy_symbol') . ' )', ['class' => 'form-label']) }}
                                            {{ Form::number('price_per_user_yearly', !empty($plan) ? $plan->price_per_user_yearly : null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Price Per User'), 'step' => '0.1', 'min' => '0']) }}
                                        </div>
                                        <div class="package-itm ">
                                            {{ Form::label('price_per_business_monthly', __('Per Business Price/Month') . ' ( ' . admin_setting('defult_currancy_symbol') . ' )', ['class' => 'form-label']) }}
                                            {{ Form::number('price_per_business_monthly', !empty($plan) ? $plan->price_per_business_monthly : null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Price Per Business'), 'step' => '0.1', 'min' => '0']) }}
                                        </div>
                                        <div class="package-itm ">
                                            {{ Form::label('price_per_business_yearly', __('Per Business Price/Year') . ' ( ' . admin_setting('defult_currancy_symbol') . ' )', ['class' => 'form-label']) }}
                                            {{ Form::number('price_per_business_yearly', !empty($plan) ? $plan->price_per_business_yearly : null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Price Per Business'), 'step' => '0.1', 'min' => '0']) }}
                                        </div>
                                        <div class="package-content flex-grow-1  ">
                                        </div>
                                        <div class="price package-price-btn">
                                            {{ Form::submit(__('Save'), ['class' => 'btn  btn-primary']) }}
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                        <!-- [ sample-page ] start -->
                        <div class="col-12">
                        <div class="event-cards row px-0">
                            @if (count($modules))
                                @foreach ($modules as $module)
                                    @if (!isset($module->display) || $module->display == true)
                                        <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-6 product-card ">
                                            <div
                                                class="card {{ $module->isEnabled() ? 'enable_module' : 'disable_module' }}">
                                                <div class="product-img">
                                                    <div class="theme-avtar">
                                                        <img src="{{ $module->image }}{{ '?' . time() }}"
                                                            alt="{{ $module->name }}" class="img-user width-100">
                                                    </div>
                                                    <div class="checkbox-custom">
                                                        <div class="btn-group card-option">
                                                            <button type="button" class="btn" data-ajax-popup="true"
                                                                data-size="md"
                                                                data-title="{{ __('Customize Logo And Name') }}"
                                                                data-url="{{ route('add-one.detail', $module->name) }}"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-original-title="{{ __('Module Setting') }}">
                                                                <i class="ti ti-adjustments"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h4> {{ $module->alias }}</h4>
                                                    <p class="text-muted text-sm mb-2">
                                                        {{ isset($module->description) ? $module->description : '' }}
                                                    </p>
                                                    <div class="price d-flex justify-content-between">
                                                        <ins><span
                                                                class="currency-type">{{ super_currency_format_with_sym(ModulePriceByName($module->name)['monthly_price']) }}</span>
                                                            <span
                                                                class="time-lbl text-muted">{{ __('/Month') }}</span></ins>
                                                        <ins><span
                                                                class="currency-type">{{ super_currency_format_with_sym(ModulePriceByName($module->name)['yearly_price']) }}</span>
                                                            <span
                                                                class="time-lbl text-muted">{{ __('/Year') }}</span></ins>
                                                    </div>
                                                    <a href="{{ route('software.details', $module->name) }}" target="_new"
                                                        class="btn  btn-outline-secondary w-100 mt-2">{{ __('View Details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="col-lg-12 col-md-12">
                                    <div class="card p-3">
                                        <div class="d-flex justify-content-center">
                                            <div class="ms-3 text-center">
                                                <h3>{{ __('Add-on Not Available') }}</h3>
                                                <p class="text-muted">{{ __('Click ') }}<a
                                                        href="{{ route('module.index') }}">{{ __('here') }}</a>
                                                    {{ __('To Acctive Add-on') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        </div>
                        <!-- [ sample-page ] end -->
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@include('plans.plan_script')
