@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('profile_edit') }}
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.profile') }}</h3>
            </div>
            <div class="db-card-body">
                <form action="{{ route('admin.profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required" for="first_name">{{ __('all.first_name') }}</label>
                            <input id="first_name" type="text" name="first_name"
                                class="db-field-control {{ $errors->has('first_name') ? ' is-invalid ' : '' }}"
                                value="{{ old('first_name', $user->first_name) }}">
                            @error('first_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required" for="last_name">{{ __('all.last_name') }}</label>
                            <input id="last_name" type="text" name="last_name" class="db-field-control {{ $errors->has('last_name') ? ' is-invalid ' : '' }}" value="{{ old('last_name', $user->last_name) }}">
                            @error('last_name')
                            <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.email') }}</label>
                            <input type="text" name="email" class="db-field-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.phone') }}<span class="text-info"></span></label>
                            <input type="text" name="phone" class="db-field-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                            <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.address') }}<span class="text-info"></span></label>
                            <input type="text" name="address" class="db-field-control @error('address') is-invalid @enderror" value="{{ old('address', $user->address) }}">
                            @error('address')
                            <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title" for="customFile">{{ __('all.image') }}</label>
                            <input name="image" type="file" class="db-field-control @error('image') invalid @enderror" id="customFile">
                            @if ($errors->has('image'))
                            <small class="db-field-alert">{{ $errors->first('image') }}</small>
                            @endif
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
