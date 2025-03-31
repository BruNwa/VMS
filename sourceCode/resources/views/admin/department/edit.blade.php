@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('departments/edit') }}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.departments') }}</h3>
            </div>
            <div class="db-card-body">
                <form action="{{ route('admin.departments.update', $department) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="name" class="db-field-title required">{{ __('all.name') }}</label>
                            <input type="text" name="name" id="name"
                                class="db-field-control @error('name') invalid @enderror"
                                value="{{ old('name', $department->name) }}">
                            @error('name')
                                <small class="db-field-alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label for="designation_id" class="db-field-title required">{{ __('all.status') }}</label>
                            <div class="db-field-down-arrow">
                                <select name="status"
                                    class="db-field-control appearance-none @error('status') invalid @enderror">
                                    @foreach (trans('statuses') as $key => $status)
                                        <option value="{{ $key }}" {{ old('status',$department->status) == $key ? 'selected' : '' }}>
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
