@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('administrators/add') }}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.administrators') }}</h3>
            </div>
            <div class="db-card-body">
                <form action="{{ route('admin.adminusers.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-row">
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="first_name"
                                class="db-field-title required">{{ __('all.first_name') }}</label>
                            <input type="text" name="first_name" id="first_name"
                                class="db-field-control @error('first_name') invalid @enderror"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="last_name"
                                class="db-field-title required">{{ __('all.last_name') }}</label>
                            <input type="text" name="last_name" id="last_name"
                                class="db-field-control @error('last_name') invalid @enderror"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="username" class="db-field-title">{{ __('all.username') }}</label>
                            <input type="text" name="username" id="username"
                                class="db-field-control @error('username') invalid @enderror"
                                value="{{ old('username') }}">
                            @error('username')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="email"
                                class="db-field-title required">{{ __('all.email') }}</label>
                            <input type="text" name="email" id="email"
                                class="db-field-control @error('email') invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="phone" class="db-field-title required">{{ __('all.phone') }}</label>
                            <input type="tel" id="number" name="phone" id="phone" class="db-field-control @error('phone') invalid @enderror" value="{{ old('phone') }}">
                            <input type="hidden" id="code" name="country_code" value="{{ old('country_code') }}">
                            <input type="hidden" id="code_name" name="country_code_name" value="{{ old('country_code_name') }}">
                            @error('phone')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="password" class="db-field-title required">{{ __('all.password') }}</label>
                            <input type="password" name="password" id="password"
                                class="db-field-control @error('password') invalid @enderror"
                                value="{{ old('password') }}">
                            @error('password')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="address" class="db-field-title">{{ __('all.address') }}</label>
                            <input type="text" name="address" id="address"
                                class="db-field-control @error('address') invalid @enderror"
                                value="{{ old('address') }}">
                            @error('address')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="administrator.role"
                                class="db-field-title required">{{ __('all.role') }}</label>
                            <div class="db-field-down-arrow">
                                <select name="role_id"
                                    class="db-field-control appearance-none @error('role_id') invalid @enderror">
                                    @foreach ($roles as $key => $role)
                                        <option value="{{ $role->id }}"
                                            {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="all.status" class="db-field-title required">{{ __('all.status') }}</label>
                            <div class="db-field-down-arrow">
                                <select name="status"
                                    class="db-field-control appearance-none @error('status') invalid @enderror">
                                    @foreach (trans('user_statuses') as $key => $status)
                                        <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>
                                            {{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title">{{ __('all.image') }}</label>
                            <input name="image" type="file"
                                class="db-field-control @error('image') invalid @enderror">
                            @if ($errors->has('image'))
                                <div class="help-block text-danger">
                                    {{ $errors->first('image') }}
                                </div>
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

@push('js')
<script>
    localStorage.setItem('country_code_name', '{{ setting('country_code_name') }}');
</script>
@endpush
