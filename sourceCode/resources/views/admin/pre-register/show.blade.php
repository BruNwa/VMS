@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('pre-registers/show') }}
            </div>
        </div>
    </div>
    <div class="p-6 mb-8 bg-white shadow-xs rounded-xl">
        <div class="flex flex-wrap gap-4 sm:gap-6">
            <img class="w-[120px] h-[120px] object-cover rounded-lg" src="{{ $preregister->visitor->images }}" alt="avatar">
            <div class="flex flex-col justify-between gap-1.5">
                <div>
                    <h3 class="text-[26px] font-semibold font-client leading-[40px] capitalize">
                        {{ ucfirst($preregister->visitor->name) }}</h3>
                    <span class="block text-sm leading-tight font-normal font-client text-[#6e7191]">{{ $preregister->visitor->email }}</span>
                    <span class="text-sm leading-4 font-normal font-client uppercase text-[#6e7191]">{{ $preregister->visitor->CountryCodeWithPhone }}</span>
                </div>
                    <div class="flex gap-3 md:gap-6">
                        <a href="https://wa.me/{{ $preregister->visitor->phone }}?text={!! strip_tags(setting('whatsapp_accept_message')) !!}{{ route('qrcode', $preregister->visitor->phone) }}"
                            target="_blank" class="accept db-btn-fill shadow-[0px_6px_10px_rgba(26,_183,_89,_0.24)] text-white bg-[#1ab759]">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span> {{ __('all.send_whatsApp') }}</span>
                        </a>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <div id="pre_register" class="profile-tabDiv active">
        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.basic_info') }}</h3>
            </div>
            <div class="db-card-body">
                <div class="py-2 row">
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.name') }}</span>
                            <span
                                class="w-full db-list-item-text sm:w-1/2">{{ ucfirst($preregister->visitor->first_name) }}
                                {{ ucfirst($preregister->visitor->last_name) }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.email') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $preregister->visitor->email }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.phone') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $preregister->visitor->CountryCodeWithPhone }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.employee') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $preregister->employee->user->name }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.expected_date') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $preregister->expected_date }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.expected_time') }}</span>
                            <span
                                class="w-full db-list-item-text sm:w-1/2">{{ date('h:i A', strtotime($preregister->expected_time)) }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.status') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{!! $preregister->visitor->MyStatus !!}</span>
                        </div>
                    </div>

                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.address') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">
                                {!! $preregister->visitor->address !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
