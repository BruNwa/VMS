@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('visitors/show') }}
            </div>
        </div>
    </div>

    <div class="p-6 mb-8 db-card">
        <div class="flex flex-wrap items-end justify-between gap-5">
            <div class="flex flex-wrap gap-4 sm:gap-6">
                <img class="w-[120px] h-[120px] object-cover rounded-lg" src="{{ $visitingDetails->images }}"
                    alt="avatar">
                <div class="flex flex-col gap-1.5 justify-between">
                    <div>
                        <h3 class="text-[26px] font-semibold font-client leading-[40px] capitalize flex-grow">
                            {{ ucfirst(optional($visitingDetails->visitor)->name) }}</h3>
                            <span class="block text-sm leading-tight font-normal font-client text-[#6e7191]">{{ optional($visitingDetails->visitor)->email}}</span>
                            <span class="text-sm leading-4 font-normal font-client uppercase text-[#6e7191]">{{ optional($visitingDetails->visitor)->countryCodeWithPhone }}</span>
                    </div>
                    <div class="flex gap-3 md:gap-3">
                        @if(setting('whatsapp_setup') && $visitingDetails->status == \App\Enums\VisitorStatus::ACCEPT)
                        <a href="https://wa.me/{{$visitingDetails->visitor->phone}}?text={!! strip_tags(setting('whatsapp_decline_message')) !!}"
                            target="_blank" class="accept db-btn-fill shadow-[0px_6px_10px_rgba(26,_183,_89,_0.24)] text-white bg-[#1ab759]">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>{{ __('all.send_whatsApp') }}</span>
                        </a>
                        @endif

                        @if($visitingDetails->status == \App\Enums\VisitorStatus::PENDDING)
                        <a href="{{ route('admin.visitor.change-status', [$visitingDetails->id,\App\Enums\VisitorStatus::ACCEPT,0])}}"
                            class="accept db-btn h-8 shadow-[0px_6px_10px_rgba(26,_183,_89,_0.24)] text-white bg-[#1ab759]">
                            <i class="fa-solid fa-check"></i>
                            <span>{{ __('all.accept') }}</span>
                        </a>
                        <a href="{{ route('admin.visitor.change-status', [$visitingDetails->id,\App\Enums\VisitorStatus::REJECT,0])}}"   class="reject db-btn h-8 shadow-[0px_6px_10px_rgba(255,_0,_107,_0.24)] text-white bg-red-500 hover:bg-red-600">
                            <i class="fa-solid fa-xmark"></i>
                            <span>{{ __('all.reject') }}</span>
                        </a>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="visitor" class="profile-tabDiv active">
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
                                class="w-full db-list-item-text sm:w-1/2">{{ optional($visitingDetails->visitor)->first_name }}
                                {{ $visitingDetails->visitor->last_name }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.email') }}</span>
                            <span
                                class="w-full db-list-item-text sm:w-1/2">{{ optional($visitingDetails->visitor)->email }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.phone') }}</span>
                            <span
                                class="w-full db-list-item-text sm:w-1/2">{{ optional($visitingDetails->visitor)->countryCodeWithPhone }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.employee') }}</span>
                            <span
                                class="w-full db-list-item-text sm:w-1/2">{{ optional($visitingDetails->employee)->user->name }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.purpose') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{!! $visitingDetails->purpose !!}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.company_name') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">{{ $visitingDetails->company_name }}</span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span
                                class="w-full db-list-item-title sm:w-1/2">{{ __('all.national_identification_no') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">
                                {{ optional($visitingDetails->visitor)->national_identification_no }}
                            </span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.check_in') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">
                                {{ date_time_format($visitingDetails->checkin_at) }}
                            </span>
                        </div>
                    </div>

                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.status') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">
                                {!! $visitingDetails->StatusName !!}
                            </span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.check_out') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">
                                {{ date_time_format($visitingDetails->checkout_at) }}
                            </span>
                        </div>
                    </div>
                    <div class="col-12 sm:col-6 !py-1.5">
                        <div class="p-0 db-list-item">
                            <span class="w-full db-list-item-title sm:w-1/2">{{ __('all.address') }}</span>
                            <span class="w-full db-list-item-text sm:w-1/2">
                                {!! optional($visitingDetails->visitor)->address !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="idcard" class="profile-tabDiv">

        <div class="db-card">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ __('all.visitor_id_card') }}</h3>
            </div>
            <div class="db-card-body">
                @if(isset($visitingDetails))
                <div class="mt-8 max-w-[571px] w-full mx-auto p-6 sm:px-16 sm:pb-16 pt-6 sm:pt-11 rounded-2xl backdrop-blur-lg bg-cardBg shadow-card flex flex-col items-center">
                    <h1 class="text-2xl sm:text-[32px] font-extrabold text-primary leading-snug">{{ __('all.visitor_id_card') }}</h1>
                    <div class="w-full mt-6 bg-white rounded-lg sm:mt-11 shadow-idcard">
                        <div class="bg-gradient-to-r from-[#496FD7] to-[#46A5ED] rounded-t-lg  lg p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex justify-center gap-[6px]">
                                    <div class="flex items-center w-8 h-8">
                                        <img class="w-full" src="{{ asset('images/'.setting('site_logo')) }}" alt="logo">
                                    </div>
                                    <div class="text-[10px] font-bold text-white">
                                        <p>{{ setting('site_name') }} </p>
                                    </div>
                                </div>
                                <div class="flex flex-col text-[10px] font-base text-white leading-none">
                                    <p>{{ setting('site_address') }}</p>
                                    <p class="my-2">{{__('E-mail:')}} {{ setting('site_email') }}</p>
                                    @if(setting('site_phone'))
                                    <p>{{__('Phone:')}} {{ setting('site_phone') }}</p>
                                    @endif
                                </div>
                            </div>
                                </div>
                            </div>
                        <div class="p-6 flex justify-start gap-x-[18px]">
                            <div class="w-36 h-36">
                                @if($visitingDetails->getFirstMediaUrl('visitor'))
                                    <img src="{{ asset($visitingDetails->getFirstMediaUrl('visitor')) }}" alt="">
                                @else
                                    <img src="{{ asset('images/'.setting('site_logo')) }}" alt="">
                                @endif
                            </div>
                            <div>
                                <div>
                                    <p class="text-base md:text-[20px] font-semibold text-primary leading-none">{{optional($visitingDetails->visitor)->name}}</p>
                                    <p class="text-[14px] font-normal mt-1">{{__('all.ph')}}: {{$visitingDetails->visitor->CountryCodeWithPhone}}</p>
                                    <p>{{__('all.id')}}# {{$visitingDetails->reg_no}}</p>
                                    <p>{{__('all.company_name')}}: {{$visitingDetails->company_name}}</p>
                                    <p>{{__('all.address')}}: {{$visitingDetails->visitor->address}}</p>
                                    <p>{{__('all.visited_to')}}: {{date('d-m-Y', strtotime($visitingDetails->created_at))}}</p>
                                    <p>{{__('all.host')}}: {{$visitingDetails->employee->name}}</p>
                                    <p><strong>{{ setting('site_name') }} </strong></p>
                                    <p><strong>{{ setting('site_address') }} </strong></p>
                                    <p><strong>{{__('all.ph')}}: {{ setting('site_phone') }} | {{__('all.email')}}: {{ setting('site_email') }}</strong></p>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
@endsection
