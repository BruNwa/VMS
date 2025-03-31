@extends('admin.app')

@section('content')

	<div class="row">
        <div class="col-12">
			<div class="custome-breadcrumb">
            {{ Breadcrumbs::render('administrators/view') }}
			</div>
        </div>

		<div class="col-12 ">
            <div class="db-card">
                <div class="p-6 mb-8 bg-white shadow-xs col-12 rounded-xl">
                    <div class="flex flex-wrap gap-4 sm:gap-6">
                        <img class="w-[120px] h-[120px] object-cover rounded-lg" src="{{ $user->images }}" alt="User profile picture">
                        <div>
                            <h3 class="text-[26px] font-semibold font-client leading-[40px] capitalize">{{ $user->name }}</h3>
                            <label class="p-0.5 px-2 rounded text-[10px] leading-4 font-medium font-client uppercase mb-[22px] text-[#E89806] bg-[#FFF5DE]">{{ $user->getrole->name ?? '' }}</label>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="profile" class="col-12 profile-tabDiv active">
            <div class="db-card">
                <div class="db-card-header">
                    <h3 class="db-card-title">Basic Information</h3>
                </div>
                <div class="db-card-body">
                    <div class="py-2 row">
                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="p-0 db-list-item">
                                <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.first_name') }}</span>
                                <span class="w-full db-list-item-text sm:w-1/2">{{ $user->first_name }}</span>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="p-0 db-list-item">
                                <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.last_name') }}</span>
                                <span class="w-full db-list-item-text sm:w-1/2">{{ $user->last_name }}</span>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="p-0 db-list-item">
                                <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.email') }}</span>
                                <span class="w-full db-list-item-text sm:w-1/2">{{ $user->email }}</span>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="p-0 db-list-item">
                                <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.phone') }}</span>
                                <span class="w-full db-list-item-text sm:w-1/2">{{ $user->countryCodeWithPhone }}</span>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="p-0 db-list-item">
                                <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.username') }}</span>
                                <span class="w-full db-list-item-text sm:w-1/2">{{ $user->username }}</span>
                            </div>
                        </div>
                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="p-0 db-list-item">
                                <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.status') }}</span>
                                <span class="w-full db-list-item-text sm:w-1/2">{!! $user->myStatus !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</div>

@endsection
