@extends('layouts.main')

@section('page-title')
    {{ __('Landing Page') }}
@endsection

@section('page-breadcrumb')
    {{ __('Landing Page') }}
@endsection

@section('page-action')
    <div class="d-flex">
        <a class="btn btn-sm btn-primary btn-icon me-2"
        data-bs-toggle="modal"
        data-bs-target="#qrcodeModal"
        id="download-qr"
        target="_blanks"
        data-bs-placement="top"
        title="{{ __('Qr Code') }}">
            <span class="text-white"><i class="fa fa-qrcode"></i></span>
        </a>
        <a class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-original-title="{{ __('Preview') }}" href="{{ url('/') }}" target="-blank"><span
                class="text-white"><i class="ti ti-eye"></i></span></a>
    </div>
@endsection

@section('content')
    <div class="row cms-page-wrp">
        <div class="col-sm-12">
            @include('landing-page::landingpage.sections')
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5>{{ __('SEO') }}</h5>
                        </div>
                        <div id="p1" class="col-auto text-end text-primary h3">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="border rounded overflow-hidden">
                        {{ Form::open(['url' => route('landingpage.seo.setting.save'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'needs-validation', 'novalidate']) }}
                        <div class="p-3 justify-content-center">
                            <div class="col-12">
                                <div class="form-group">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('meta_keywords', __('Meta Keywords'), ['class' => 'col-form-label pt-0']) }}
                                                {{ Form::textarea('meta_keywords', !empty($settings['meta_keywords']) ? $settings['meta_keywords'] : null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Meta Keywords', 'rows' => 2]) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('meta_description', __('Meta Description'), ['class' => 'col-form-label pt-0']) }}
                                                {{ Form::textarea('meta_description', !empty($settings['meta_description']) ? $settings['meta_description'] : null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Meta Description', 'rows' => 3]) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('google_analytics', __('Google Analytics'), ['class' => 'col-form-label pt-0']) }}
                                                {{ Form::text('google_analytics', !empty($settings['google_analytics']) ? $settings['google_analytics'] : null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Google Analytics']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('facebook_pixel', __('Facebook pixel'), ['class' => 'col-form-label pt-0']) }}
                                                {{ Form::text('facebook_pixel', !empty($settings['facebook_pixel']) ? $settings['facebook_pixel'] : null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Facebook pixel']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group mb-0">
                                                {{ Form::label('Meta Image', __('Meta Image'), ['class' => 'col-form-label pt-0']) }}
                                            </div>
                                            <div class="setting-card">
                                                <div class="logo-content">
                                                    <img id="image2"
                                                        src="{{ get_file(!empty($settings['meta_image']) ? (check_file($settings['meta_image']) ? $settings['meta_image'] : 'uploads/meta/meta_image.png') : 'uploads/meta/meta_image.png') }}{{ '?' . time() }}"
                                                        class="img_setting seo_image">
                                                </div>
                                                <div class="choose-files mt-4">
                                                    <label for="meta_image">
                                                        <div class="bg-primary company_favicon_update"> <i
                                                                class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                        </div>
                                                        <input type="file" class="form-control file"
                                                            accept="image/png, image/gif, image/jpeg,image/jpg"
                                                            id="meta_image" name="meta_image"
                                                            onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])"
                                                            data-filename="meta_image" >
                                                    </label>
                                                </div>
                                                @error('meta_image')
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <input class="btn btn-print-invoice btn-primary" type="submit"
                                value="{{ __('Save Changes') }}">
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5>{{ __('Pixel Fields') }}</h5>
                        </div>
                        <div class="col-auto justify-content-end d-flex">
                            <a data-size="lg" data-url="{{ route('landingpagePixel.create') }}" data-ajax-popup="true"
                                data-bs-toggle="tooltip" title="{{ __('Create') }}"
                                data-title="{{ __('Create New Pixel Field') }}" class="btn btn-sm btn-primary">
                                <i class="ti ti-plus text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('PLATFORM') }}</th>
                                    <th>{{ __('PIXEL ID') }}</th>
                                    <th class="text-end">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($pixels) && (is_array($pixels) || is_object($pixels)))
                                    @foreach ($pixels as $key => $value)
                                        <tr>
                                            <td>{{ $pixals_platforms[$value->platform] }}</td>
                                            <td>{{ $value->pixel_id }}</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="action-btn">
                                                        {!! Form::open([
                                                            'method' => 'GET',
                                                            'route' => ['destroy.pixel', ['pixelId' => $value->id]],
                                                            'id' => 'delete-form-' . $key,
                                                        ]) !!}
                                                        <a href="#"
                                                            class="btn btn-sm bg-danger align-items-center bs-pass-para show_confirm"
                                                            data-bs-toggle="tooltip" title="{{ __('Delete') }}"
                                                            data-original-title="{{ __('Delete') }}"
                                                            data-confirm-yes="{{ 'delete-form-' . $key }}">
                                                            <i class="ti ti-trash text-white"></i>
                                                        </a>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="{{ asset('assets/js/plugins/summernote-0.8.18-dist/summernote-lite.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/plugins/summernote-0.8.18-dist/summernote-lite.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTrigger = document.getElementById('download-qr');
            var tooltip = new bootstrap.Tooltip(tooltipTrigger);
        });
    </script>
@endpush
