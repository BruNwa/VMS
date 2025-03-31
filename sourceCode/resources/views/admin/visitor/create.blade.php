@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('visitors/add') }}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.visitors') }}</h3>
            </div>
            <div class="db-card-body">
                <form action="{{ route('admin.visitors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required" for="first_name">{{ __('all.first_name') }}</label>
                            <input id="first_name" type="text" name="first_name" class="db-field-control @error('first_name') invalid @enderror" value="{{ old('first_name') }}">
                            @error('first_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required" for="last_name">{{ __('all.last_name') }}</label>
                            <input id="last_name" type="text" name="last_name" class="db-field-control @error('last_name') invalid @enderror" value="{{ old('last_name') }}">
                            @error('last_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.email') }}</label>
                            <input type="text" name="email" class="db-field-control @error('email') invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.phone') }}<span class="text-info"></span></label>
                            <input type="tel" id="number" name="phone" class="db-field-control @error('phone') invalid @enderror" value="{{ old('phone') }}" onkeypress="validate(event)">
                            <input type="hidden" id="code" name="country_code" value="1">
                            <input type="hidden" id="code_name" name="country_code_name" value="us">
                            @error('phone')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required" for="gender">{{ __('all.gender') }}</label>
                            <select id="gender" name="gender" class="db-field-control select2 @error('gender') invalid @enderror">
                                @foreach(trans('genders') as $key => $gender)
                                    <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : '' }}>{{ $gender }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title">{{ __('all.company_name') }}</label>
                            <input type="text" name="company_name" class="db-field-control @error('company_name') invalid @enderror" value="{{ old('company_name') }}">
                            @error('company_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title">{{ __('all.national_identification_no') }}</label>
                            <input type="text" name="national_identification_no" class="db-field-control @error('national_identification_no') invalid @enderror" value="{{ old('national_identification_no') }}">
                            @error('national_identification_no')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required" for="employee_id">{{ __('all.select_employee') }}</label>
                            <select id="employee_id" name="employee_id" class="db-field-control select2 @error('employee_id') invalid @enderror">
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name }} ({{ optional($employee->department)->name }})</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.purpose') }}</label>
                            <input type="text" name="purpose" class="db-field-control @error('purpose') invalid @enderror" value="{{ old('purpose') }}">
                            @error('purpose')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title">{{ __('all.address') }}</label>
                            <input type="text" name="address" class="db-field-control @error('address') invalid @enderror" value="{{ old('address') }}">
                            @error('address')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title {{ setting('photo_capture_enable') ? 'required' : '' }}" for="customFile">{{ __('all.image') }}</label>
                            <input name="image" type="file" class="db-field-control @error('image') invalid @enderror" id="customFile">
                            @if($errors->has('image'))
                                <small class="db-field-alert">{{ $errors->first('image') }}</small>
                            @endif
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
