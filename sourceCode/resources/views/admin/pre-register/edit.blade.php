@extends('admin.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="custome-breadcrumb">
            {{ Breadcrumbs::render('pre-registers/edit') }}
        </div>
    </div>
</div>
<div class="col-12">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('pre_register.pre_register') }}
            </h3>
        </div>
        <div class="db-card-body">
            <form action="{{ route('admin.pre-registers.update', $preregister) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required" for="first_name">{{ __('all.first_name') }}</label>
                        <input id="first_name" type="text" name="first_name" class="db-field-control @error('first_name') invalid @enderror" value="{{ old('first_name',optional($preregister->visitor)->first_name) }}">
                        @error('first_name')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required" for="last_name">{{ __('all.last_name') }}</label>
                        <input id="last_name" type="text" name="last_name" class="db-field-control @error('last_name') invalid @enderror" value="{{ old('last_name',optional($preregister->visitor)->last_name) }}">
                        @error('last_name')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title">{{ __('all.email') }}</label>
                        <input type="text" name="email" class="db-field-control @error('email') invalid @enderror" value="{{ old('email',optional($preregister->visitor)->email) }}">
                        @error('email')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required">{{ __('all.phone') }} <span class="text-info"></span></label>
                        <input type="tel" id="number" name="phone" class="db-field-control @error('phone') invalid @enderror" value="{{ old('phone',optional($preregister->visitor)->phone) }}">
                        <input type="hidden" id="code" name="country_code" value="{{ old('country_code',$preregister->visitor->country_code) }}">
                        <input type="hidden" id="code_name" name="country_code_name" value="{{ old('country_code_name',$preregister->visitor->country_code_name) }}">
                        @error('phone')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required" for="gender">{{ __('all.gender') }}</label>
                        <select id="gender" name="gender" class="db-field-control select2 @error('gender') invalid @enderror">
                            @foreach(trans('genders') as $key => $gender)
                            <option value="{{ $key }}" {{ (old('gender',optional($preregister->visitor)->gender) == $key) ? 'selected' : '' }}>{{ $gender }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required">{{ __('all.national_identification_no') }}</label>
                        <input type="text" name="national_identification_no" class="db-field-control @error('national_identification_no') invalid @enderror" value="{{ old('national_identification_no',optional($preregister->visitor)->national_identification_no) }}">
                        @error('national_identification_no')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title required" for="employee_id">{{ __('all.select_employee') }}</label>
                        <select id="employee_id" name="employee_id" class="db-field-control select2 @error('employee_id') invalid @enderror">
                            <option value="">--</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ (old('employee_id',$preregister->employee_id) == $employee->id) ? 'selected' : '' }}>
                                {{ $employee->name }} ( {{ optional($employee->department)->name }} )</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label for="expected_date" class="db-field-title required">{{ __('all.expected_date') }}</label>
                        <input type="date" name="expected_date" id="expected_date" class="db-field-control @error('expected_date') invalid @enderror" value="{{ old('expected_date',$preregister->expected_date) }}">
                        @error('expected_date')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label for="expected_time" class="db-field-title required">{{ __('all.expected_time') }}</label>
                        <input type="time" name="expected_time" class="db-field-control @error('expected_time') invalid @enderror" id="expected_time" value="{{ old('expected_time',$preregister->expected_time) }}">
                        @error('expected_time')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title">{{ __('all.comment') }}</label>
                        <input type="text" name="comment" class="db-field-control @error('comment') invalid @enderror" value="{{ old('comment',$preregister->comment) }}">
                        @error('comment')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-col-12 sm:form-col-6 md:form-col-4">
                        <label class="db-field-title">{{ __('all.address') }}</label>
                        <input type="text" name="address" class="db-field-control @error('address') invalid @enderror" value="{{ old('address',optional($preregister->visitor)->address) }}">
                        @error('address')
                        <small class="db-field-alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="text-white db-btn bg-primary">
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
    localStorage.setItem('country_code_name', '{{ $preregister->visitor->country_code_name }}');
</script>

@endpush
