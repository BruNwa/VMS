@extends('frontend.layouts.frontend')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/lib/inttelinput/css/intlTelInput.css') }}">
@endsection

@section('content')
<section class="h-screen">
    <div class="container ">
        <div class="pb-12 mt-12 row">
            <div class="lg:col-6 col-12 !pt-0">
                <form action="{{ route('check-in.step-one.next') }}" method="POST">
                    @csrf
                    <h1 class="text-2xl sm:text-[32px] font-extrabold text-primary mb-6 leading-none">{{ __('all.visitor_details') }}</h1>
                    @if (@$visitor->image)
                    <div class="flex sm:flex-row flex-col flex-wrap gap-3 justify-between items-center mb-5 p-3 bg-userBg backdrop-blur-[15px] rounded-2xl">
                        <p class="font-semibold ">Your Last Saved Photo</p>
                        <div class="h-24 max-w-40">
                            <img class="w-full h-full rounded-2xl" src="{{ $visitor->image }}" alt="Visitor Image">
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="lg:col-6 md:col-6 col-12">
                            <label class="block mb-2 text-sm font-medium tracking-wide text-black required" for="first_name">{{ __('all.first_name') }}</label>
                            <input type="text" name="first_name" id="first_name"
                                class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('first_name') is-invalid @enderror"
                                value="{{ isset($visitor->first_name) ? $visitor->first_name : old('first_name') }}"
                                {{ isset($visitor->first_name) ? 'readonly' : '' }}>
                            @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-0 lg:col-6 md:col-6 col-12">
                            <label class="block mb-2 text-sm font-medium tracking-wide text-black required" for="">{{ __('all.last_name') }}</label>
                            <input type="text" name="last_name" id="last_name"
                                class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('last_name') is-invalid @enderror"
                                value="{{ isset($visitor->last_name) ? $visitor->last_name : old('last_name') }}"
                                {{ isset($visitor->last_name) ? 'readonly' : '' }}>
                            @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="lg:col-6 md:col-6 col-12">
                            <label class="block mb-2 text-sm font-medium tracking-wide text-black required" for="">{{ __('all.phone') }}</label>
                            <input type="text" name="phone" id="number"
                                class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('phone') is-invalid @enderror"
                                value="{{ isset($visitor->phone) ? $visitor->phone : old('phone') }}"
                                {{ isset($visitor->phone) ? 'readonly' : '' }}>
                            <input type="hidden" id="code" name="country_code" value="1">
                            <input type="hidden" id="code_name" name="country_code_name" value="us">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-0 lg:col-6 md:col-6 col-12">
                            <label class="block mb-2 text-sm font-medium tracking-wide text-black" for="">{{ __('all.email') }}</label>
                            <input type="text" name="email" id="email"
                                class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('email') is-invalid @enderror"
                                value="{{ isset($visitor->email) ? $visitor->email : old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="relative lg:col-6 md:col-6 col-12">

                            <label class="block mb-2 text-sm font-medium tracking-wide text-black required" for="gender">{{ __('all.gender') }}</label>
                            <select id="gender" name="gender"
                                class="appearance-none w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white active:border-gray-400 @error('gender') is-invalid @enderror"
                                {{ isset($visitor->gender) ? 'readonly' : '' }}>
                                @foreach (trans('genders') as $key => $gender)
                                <option value="{{ $key }}"
                                    {{ (isset($visitor->gender) ? $visitor->gender : old('gender')) == $key ? 'selected' : '' }}>
                                    {{ $gender }}
                                </option>
                                @endforeach
                            </select>
                            <div class="absolute flex items-center px-2 pointer-events-none top-1/2 right-3 text-primary">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="relative pt-0 lg:col-6 md:col-6 col-12">
                            <label class="block mb-2 text-sm font-medium tracking-wide text-black required" for="employee_id">{{ __('all.select_employee') }}</label>
                            <select id="employee_id" name="employee_id"
                                class="appearance-none block w-full text-primary border border-[#97A3C0]  rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white active:border-gray-400 @error('employee_id') is-invalid @enderror">
                                <option value="">{{ __('Select Employee') }}</option>
                                @foreach ($employees as $key => $employee)
                                <option value="{{ $employee->id }}"
                                    {{ old('employee_id', $employee_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }} (
                                    {{ optional($employee->department)->name }} )
                                </option>
                                @endforeach
                            </select>
                            <div class="absolute flex items-center px-2 pointer-events-none top-1/2 right-3 text-primary">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            @error('employee_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="lg:col-6 md:col-6 col-12">

                            <label class="block mb-2 text-sm font-medium tracking-wide text-black" for="company_name">{{ __('all.company_name') }}</label>
                            <input type="text" name="company_name" id="company_name"
                                class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('company_name') is-invalid @enderror"
                                value="{{ isset($company_name) ? $company_name : old('company_name', isset($visitor->company_name) ? $visitor->company_name : '') }}">
                            @error('company_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-0 lg:col-6 md:col-6 col-12">


                            <label class="block mb-2 text-sm font-medium tracking-wide text-black required" for="national_identification_no">{{ __('all.national_identification_no') }}
                            </label>
                            <input type="text" name="national_identification_no"
                                id="national_identification_no"
                                class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('national_identification_no') is-invalid @enderror"
                                value="{{ isset($visitor->national_identification_no) ? $visitor->national_identification_no : old('national_identification_no') }}"
                                {{ isset($visitor->national_identification_no) ? 'readonly' : '' }}>
                            @error('national_identification_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="pt-0 lg:col-6 md:col-6 col-12">
                            <label class="block mb-2 text-sm font-medium tracking-wide text-black required" for="purpose">{{ __('all.purpose') }}</label>
                            <textarea name="purpose" class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('purpose')is-invalid @enderror"
                                id="purpose">{{ old('purpose') }}</textarea>
                            @error('purpose')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-0 lg:col-6 md:col-6 col-12">
                            <label class="block mb-2 text-sm font-medium tracking-wide text-black" for="address">{{ __('all.address') }}</label>
                            <textarea name="address" class="appearance-none block w-full text-primary border border-[#97A3C0] rounded-[12px] py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white @error('address')is-invalid @enderror"
                                id="address">{{ isset($visitor->address) ? $visitor->address : old('address') }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @if (setting('terms_visibility_status'))
                    <div class="row">
                        <div class="pt-3 col-12">
                            <div class="flex items-center gap-2 form-check">
                                <input type="checkbox" class="form-check-input @error('accept_tc')is-invalid @enderror" id="accept_tc"
                                    name="accept_tc">
                                <label class="text-sm" for="accept_tc"> I agree to these <a
                                        class="text-primary" href="{{ route('terms_and_conditions.view') }}"
                                        target="_blank">Terms and Conditions.</a></label>
                            </div>
                            @error('accept_tc')
                            <div class="invalid-feedback">
                                {{ $errors->first('accept_tc') }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('/') }}" class="px-6 py-3 text-lg font-bold leading-snug text-white bg-danger rounded-3xl shadow-btnDanger">{{ __('all.cancel') }}</a>
                        <a><button type="submit" class="px-6 py-3 text-lg font-bold leading-snug text-white bg-primary rounded-3xl shadow-btnNext btn-submit-one" id="continue">{{ __('all.continue') }}</button></a>
                    </div>
                </form>
            </div>
            <div class="justify-end hidden lg:col-6 mt-9 lg:flex">
                <div class="imgGroup xl:max-w-[497px] lg:max-w-[409px] md:max-w-[350px] w-full">
                    <img src="{{ asset('frontend/images/visitor_details/image1.png') }}" alt="image1" class="img1">
                    <img src="{{ asset('frontend/images/visitor_details/image2.png') }}" alt="image2" class="img2">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script defer src="{{ asset('assets/lib/inttelinput/js/intlTelInput-jquery.js') }}"></script>
<script defer src="{{ asset('assets/lib/inttelinput/js/intlTelInput.js') }}"></script>
<script defer src="{{ asset('assets/lib/inttelinput/js/utils.js') }}"></script>
<script defer src="{{ asset('assets/lib/inttelinput/js/data.js') }}"></script>
<script defer src="{{ asset('assets/lib/inttelinput/js/init.js') }}"></script>
@endsection
