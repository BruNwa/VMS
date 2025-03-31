@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-role-edit') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
    <div class = "col-12 md:col-8 xl:col-9">
        <div class = "db-card">
            <div class = "db-card-header">
                <h3 class = "db-card-title">{{ __('all.roles') }}</h3>
            </div>
            <div class="db-card-body">
                <form action="{{ route('admin.role.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-col-12 sm:form-col-6 md:form-col-4">
                            <label class="db-field-title required">{{ __('all.name') }}</label>
                            <input type="text" name="name" class="db-field-control @error('name') invalid @enderror"
                                value="{{ old('name', $role->name) }}">
                            @error('name')
                                <small class="db-field-alert">
                                    {{ $message }}
                                </small>
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
