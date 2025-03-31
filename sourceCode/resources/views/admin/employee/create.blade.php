@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('employees/add') }}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.employees') }}</h3>
            </div>
            <div class="db-card-body">
                <form action="{{ route('admin.employees.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-row">
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.first_name') }}</label>
                            <input type="text" name="first_name"
                                class="db-field-control @error('first_name') invalid @enderror"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.last_name') }}</label>
                            <input type="text" name="last_name"
                                class="db-field-control @error('last_name') invalid @enderror"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.email') }}</label>
                            <input type="text" name="email" class="db-field-control @error('email') invalid @enderror"
                                value="{{ old('email') }}">
                            @error('email')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.phone') }}</label>
                            <input type="tel" id="number" name="phone"
                                class="db-field-control @error('phone') invalid @enderror" value="{{ old('phone') }}">

                            <input type="hidden" id="code" name="country_code" value="">
                            <input type="hidden" id="code_name" name="country_code_name" value="">

                            @error('phone')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.joining') }}</label>
                            <input type="date" name="date_of_joining"
                                class="db-field-control @error('date_of_joining') invalid @enderror"
                                value="{{ old('date_of_joining') }}">
                            @error('date_of_joining')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.gender') }}</label>
                            <div class="db-field-down-arrow">
                                <select name="gender"
                                    class="db-field-control appearance-none @error('gender') invalid @enderror">
                                    @foreach (trans('genders') as $key => $gender)
                                        <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : '' }}>
                                            {{ $gender }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <small class="db-field-alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.department') }}</label>
                            <div class="db-field-down-arrow">
                                <select name="department_id"
                                    class="db-field-control appearance-none @error('department_id') invalid @enderror">
                                    @foreach ($departments as $key => $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <small class="db-field-alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.designation') }}</label>
                            <div class="db-field-down-arrow">
                                <select name="designation_id"
                                    class="db-field-control appearance-none @error('designation_id') invalid @enderror"">
                                    @foreach ($designations as $key => $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ old('designation_id') == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                    <small class="db-field-alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.status') }}</label>
                            <div class="db-field-down-arrow">
                                <select name="status"
                                    class="db-field-control appearance-none @error('status') invalid @enderror">
                                    @foreach (trans('statuses') as $key => $status)
                                        <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>
                                            {{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <small class="db-field-alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.password') }}</label>
                            <input type="password" name="password"
                                class="db-field-control @error('password') invalid @enderror"
                                value="{{ old('password') }}">
                            @error('password')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.confirm_password') }}</label>
                            <input type="password" name="password_confirmation"
                                class="db-field-control @error('password_confirmation') invalid @enderror"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title">{{ __('all.about') }}</label>
                            <input type="text" name="about"
                                class="db-field-control @error('about') invalid @enderror" {{ old('about') }}>
                            @error('about')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title">{{ __('all.image') }}</label>
                            <input type="file" name="image"
                                class="db-field-control @error('image') invalid @enderror">
                            @error('image')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="flex flex-wrap gap-3">
                                <button class="text-white db-btn bg-primary">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>{{ __('all.button') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

