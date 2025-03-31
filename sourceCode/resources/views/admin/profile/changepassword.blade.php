@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('change_pass') }}
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.change_password') }}</h3>
            </div>
            <div class="db-card-body">
                <form action="{{ route('admin.profile.change') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.old_password') }}</label>
                            <input type="password" id="old_password" name="old_password" class="db-field-control @error('old_password') invalid @enderror" value="{{ old('old_password') }}">
                            @error('old_password')
                            <div class="db-field-alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.password') }}</label>
                            <input type="password" name="password" class="db-field-control @error('password') invalid @enderror" value="{{ old('password') }}">
                            @error('password')
                            <div class="db-field-alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.password_confirmation') }}</label>
                            <input type="password" name="password_confirmation" class="db-field-control @error('password_confirmation') invalid @enderror" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                            <div class="db-field-alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="text-white db-btn bg-primary">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>{{ __('all.save') }}</span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
