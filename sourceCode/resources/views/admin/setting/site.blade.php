@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-site') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')

<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.site') }}</h3>
        </div>
        <div class="db-card-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.setting.site-update') }}">
                @csrf
                <div class="row">
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.site_name') }}</label>
                        <input type="text" name="site_name" id="site_name" class="db-field-control @error('site_name') invalid @enderror" value="{{ old('site_name', setting('site_name')) }}">
                        @error('site_name')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.site_email') }}</label>
                        <input type="email" name="site_email" id="site_email" class="db-field-control @error('site_email') invalid @enderror" value="{{ old('site_email', setting('site_email')) }}">
                        @error('site_email')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.site_phone_number') }}</label>
                        <input type="tel" id="number" name="site_phone_number" id="site_phone_number" class="db-field-control @error('site_phone_number') invalid @enderror" value="{{ old('site_phone_number', setting('site_phone_number')) }}">
                        <input type="hidden" id="code" name="country_code" value="{{ old('country_code', setting('country_code')) }}">
                        <input type="hidden" id="code_name" name="country_code_name" value="{{ old('country_code_name',setting('country_code_name')) }}">
                        @error('site_phone_number')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.site_address') }}</label>
                        <input type="text" name="site_address" id="site_address" class="db-field-control @error('site_address') invalid @enderror" value="{{ old('site_address', setting('site_address')) }}">
                        @error('site_address')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.timezone') }}</label>
                        <?php
                        $className = 'db-field-control appearance-none';
                        if ($errors->first('timezone')) {
                            $className = 'db-field-control appearance-none';
                        }
                        echo Timezonelist::create('timezone', setting('timezone'), ['class' => $className]); ?>
                        @error('timezone')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.language') }}</label>
                        <div class="db-field-down-arrow">
                            <select type="text" name="locale" id="locale" class="db-field-control appearance-none @error('locale') invalid @enderror">
                                @if(!blank($language))
                                @foreach($language as $lang )
                                <option value="{{$lang->code }}" {{ (old('locale', setting('locale')) == $lang->code) ? 'selected' : '' }}> <span class="flag-icon flag-icon-aw ">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}&nbsp</span>{{ $lang->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6">
                        <label class="db-field-title required">{{ __('all.copyright') }}</label>
                        <input type="text" name="site_footer" id="site_footer" class="db-field-control @error('site_footer') invalid @enderror" value="{{ old('site_footer', setting('site_footer')) }}">
                        @error('site_footer')
                            <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                        <div class="col-12 sm:col-6">
                            <label class="db-field-title">{{ __('all.front_end') }}</label>
                            <div class="db-field-radio-group">
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" class="custom-radio-field" name="front_end_enable_disable" {{ setting('front_end_enable_disable') == true ? "checked":"" }} value="1">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="enable" class="db-field-label">{{ trans('all.enable') }}</label>
                                </div>
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" name="front_end_enable_disable" class="custom-radio-field" {{ setting('front_end_enable_disable') == false ? "checked":"" }} value="0">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="disable" class="db-field-label">{{ trans('all.disable') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6">
                            <label class="db-field-title">{{__('all.email_notifications')}}</label>
                            <div class="db-field-radio-group">
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" class="custom-radio-field" name="notifications_email" {{ setting('notifications_email') == true ? "checked":"" }} value="{{ \App\Enums\Activity::ENABLE }}">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="enable" class="db-field-label">{{ trans('all.enable') }}</label>
                                </div>
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" name="notifications_email" class="custom-radio-field" {{ setting('notifications_email') == false ? "checked":"" }} value="{{ \App\Enums\Activity::DISABLE }}">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="disable" class="db-field-label">{{ trans('all.disable') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6">
                            <label class="db-field-title">{{__('all.whats_app')}}</label>
                            <div class="db-field-radio-group">
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" class="custom-radio-field" name="whatsapp_setup" {{ setting('whatsapp_setup') == true ? "checked":"" }} value="1">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="enable" class="db-field-label">{{ trans('all.enable') }}</label>
                                </div>
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" name="whatsapp_setup" class="custom-radio-field" {{ setting('whatsapp_setup') == false ? "checked":"" }} value="0">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="disable" class="db-field-label">{{ trans('all.disable') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6">
                            <label class="db-field-title">{{ __('all.photo_capture') }}</label>
                            <div class="db-field-radio-group">
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" class="custom-radio-field" name="photo_capture_enable"
                                            {{ setting('photo_capture_enable') == true ? 'checked' : '' }} value="1">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="enable" class="db-field-label">{{ trans('all.enable') }}</label>
                                </div>
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" name="photo_capture_enable" class="custom-radio-field"
                                            {{ setting('photo_capture_enable') == false ? 'checked' : '' }} value="0">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="disable" class="db-field-label">{{ trans('all.disable') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6">
                            <label class="db-field-title">{{ __('all.terms_condition') }}</label>
                            <div class="db-field-radio-group">
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" class="custom-radio-field" name="terms_visibility_status"
                                            {{ setting('terms_visibility_status') == true ? 'checked' : '' }} value="1">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="enable" class="db-field-label">{{ trans('all.enable') }}</label>
                                </div>
                                <div class="db-field-radio">
                                    <div class="custom-radio">
                                        <input type="radio" name="terms_visibility_status" class="custom-radio-field"
                                            {{ setting('terms_visibility_status') == false ? 'checked' : '' }} value="0">
                                        <span class="custom-radio-span"></span>
                                    </div>
                                    <label for="disable" class="db-field-label">{{ trans('all.disable') }}</label>
                                </div>
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

@push('js')
<script>
    localStorage.setItem('country_code_name', '{{ setting('country_code_name') }}');
</script>
@endpush
