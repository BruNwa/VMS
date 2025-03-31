<header class="db-header ">
    <a href="{{ route('/') }}" class="flex-shrink-0 max-w-[240px] h-5"><img class="w-full !h-5" src="{{ themeSetting('site_logo') ? themeSetting('site_logo')->logo : asset('images/site_logo.png') }}" alt={{ __('Visitor pass Logo') }}></a>
    <div class="flex items-center justify-end w-full gap-4">
        <div class="sub-header flex items-center gap-4 transition xh:justify-between xh:fixed xh:left-0 xh:w-full xh:p-4 xh:border-y xh:border-[#EFF0F6] xh:bg-white">
            <div class="db-card-filter">
            <button data-modal="#modal-content1" class="db-btn-fill primary"><i class="fa-solid fa-right-from-bracket"></i><span>{{ __('all.checkout') }}</span></button>
            </div>
            <div class="db-card-filter">
                @if(!blank($attendance))
                <div class="db-card-filter">
                    @if(!$attendance->checkout_time)
                    <form action="{{ route('admin.attendance.clockout')}}" method="post"> {{ csrf_field() }}
                        <button type="submit" class="db-btn-fill primary">
                            <i class="fa-solid fa-circle-minus"></i>
                            <span> {{ __('all.clock_out') }}</span>
                        </button>
                    </form>
                    @endif
                </div>
                @else
                <div class="db-card-filter">
                    <button type="button" data-modal="#modal-content" class="db-btn-fill primary">
                        <i class="fa-solid fa-circle-plus"></i>
                        {{ __('all.clock_in') }}
                    </button>
                </div>
                @endif
            </div>
            <div class="relative language-group dropdown-group">
                <button class="flex items-center gap-2 !px-3 rounded-lg dropdown-btn db-btn-fill">
                    @if(!blank($language))
                    @foreach($language as $lang )
                    @if(Session()->has('applocale') AND Session()->get('applocale') AND setting('locale'))
                    @if(Session()->get('applocale') == $lang->code)
                    <span class="hidden text-xs font-medium capitalize md:block whitespace-nowrap text-heading">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}</span>{{ $lang->name }}</span>
                    @endif
                    @else
                    @if(setting('locale') == $lang->code)
                    <span class="hidden text-xs font-medium capitalize md:block whitespace-nowrap text-heading">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}</span>{{ $lang->name }}</span>
                    @endif
                    @endif
                    @endforeach
                    @endif
                </button>
                <ul class="p-2 min-w-[180px] rounded-lg shadow-xl absolute top-14 ltr:right-0 rtl:left-0 z-10 border border-gray-200 bg-white hidden dropdown-list">
                    @if(!blank($language))
                    @foreach($language as $lang )
                    <li data-dir="ltr" class="flex items-center gap-2 py-1.5 px-2.5 rounded-md cursor-pointer hover:bg-gray-100">
                        <a href="{{ route('admin.lang.index',$lang->code) }}" data-dir="ltr">
                            <span class="mr-2 text-sm capitalize text-heading">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }} </span>{{ $lang->name }}</span>
                        </a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <button class="rounded-lg fa-solid fa-align-left db-header-nav w-9 h-9 text-primary bg-primary/5"></button>
        <button data-account="#profile" class="flex items-center gap-2">
            <img class="flex-shrink-0 object-cover rounded-lg w-9 h-9" src="{{ auth()->user()->images }}" alt="avatar">
            <h3 class="whitespace-nowrap text-sm capitalize text-left leading-[17px]"> {{ auth()->user()->getrole->name }}<b class="block font-semibold">{{ __('all.hi') }}, {{ auth()->user()->name }}</b></h3>
            <i class="fa-solid fa-caret-down text-xs ml-1.5"></i>
        </button>
    </div>
</header>
<aside id="profile" class="ltr:translate-x-[105%] rtl:-translate-x-[105%] fixed top-0 ltr:right-0 rtl:left-0 z-[60] w-full max-w-sm ltr:shadow-sidebar-left rtl:shadow-sidebar-right h-screen transition-all duration-500 bg-white">
    <div class="py-5 mx-auto text-center w-fit">
        <button class="fa-solid fa-xmark absolute top-4 ltr:right-4 rtl:left-4 text-white bg-[#FB4E4E] xmark-btn"></button>
        <figure class="relative z-10 w-[98px] h-[98px] border-2 border-dashed rounded-full inline-flex items-center justify-center border-white bg-gradient-to-t from-[#FF7A00] to-[#FF016C]
        before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-24 before:h-24 before:rounded-full before:-z-10 before:bg-white">
            <img class="w-[90px] h-[90px] rounded-full shadow-avatar" src="{{ auth()->user()->images }}" alt="avatar">
        </figure>
        <h3 class="font-medium text-sm leading-6 capitalize mb-0.5">{{ auth()->user()->name }}</h3>
        <p class="font-medium text-sm leading-6 capitalize mb-0.5">{{ auth()->user()->getrole->name }}</p>
        <p class="text-xs mb-0.5">{{ auth()->user()->email }}</p>
        <p class="text-xs">{{ auth()->user()->phone }}</p>
    </div>
    <nav class="px-4 h-[calc(100vh_-_225px)] overflow-y-auto thin-scrolling">
        <a href="{{ route('admin.profile.edit') }}" class="paper-link transition w-full flex items-center gap-3.5 py-2.5 border-b last:border-none border-[#EFF0F6]">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.33333 1.33301H5.99999C2.66666 1.33301 1.33333 2.66634 1.33333 5.99967V9.99967C1.33333 13.333 2.66666 14.6663 5.99999 14.6663H9.99999C13.3333 14.6663 14.6667 13.333 14.6667 9.99967V8.66634" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.6933 2.0135L5.44 7.26684C5.24 7.46684 5.04 7.86017 5 8.14684L4.71333 10.1535C4.60666 10.8802 5.12 11.3868 5.84666 11.2868L7.85333 11.0002C8.13333 10.9602 8.52666 10.7602 8.73333 10.5602L13.9867 5.30684C14.8933 4.40017 15.32 3.34684 13.9867 2.0135C12.6533 0.680168 11.6 1.10684 10.6933 2.0135Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.94 2.7666C10.3867 4.35993 11.6333 5.6066 13.2333 6.05993" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="text-sm leading-6 capitalize">{{ __('all.edit_profile') }}</span>
        </a>
        <a href="{{ route('admin.profile.changepassword')}}" class="paper-link transition w-full flex items-center gap-3.5 py-2.5 border-b last:border-none border-[#EFF0F6]">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.1933 9.95289C11.82 11.3196 9.85333 11.7396 8.12666 11.1996L4.98666 14.3329C4.76 14.5662 4.31333 14.7062 3.99333 14.6596L2.54 14.4596C2.06 14.3929 1.61333 13.9396 1.54 13.4596L1.34 12.0062C1.29333 11.6862 1.44666 11.2396 1.66666 11.0129L4.8 7.87956C4.26666 6.14622 4.68 4.17956 6.05333 2.81289C8.02 0.846224 11.2133 0.846224 13.1867 2.81289C15.16 4.77956 15.16 7.98622 13.1933 9.95289Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.59334 11.6602L6.12667 13.1935" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.66667 7.33301C10.219 7.33301 10.6667 6.88529 10.6667 6.33301C10.6667 5.78072 10.219 5.33301 9.66667 5.33301C9.11439 5.33301 8.66667 5.78072 8.66667 6.33301C8.66667 6.88529 9.11439 7.33301 9.66667 7.33301Z" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="text-sm leading-6 capitalize">{{ __('all.change_password') }}</span>
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="paper-link transition w-full flex items-center gap-3.5 py-2.5 border-b last:border-none border-[#EFF0F6]">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.93333 5.04016C6.14 2.64016 7.37333 1.66016 10.0733 1.66016H10.16C13.14 1.66016 14.3333 2.85349 14.3333 5.83349V10.1802C14.3333 13.1602 13.14 14.3535 10.16 14.3535H10.0733C7.39333 14.3535 6.16 13.3868 5.94 11.0268" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10 8H2.41333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.90001 5.7666L1.66667 7.99994L3.90001 10.2333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="text-sm leading-6 capitalize">{{ __('all.log_out') }}</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
            @csrf
        </form>
    </nav>
</aside>


<div id="modal-content" class="modal">
    <div class="modal-dialog">
        <div class="modal-header">
            <h3 class="modal-title">{{ __('all.clock_in') }} - <span class="clock-span"><i class="icon ti ti-clock-hour-4 font-size-clock-icon"></i>{{ date('g:i A') }}</span></h3>
            <button class="text-xl modal-close fa-solid fa-xmark text-slate-400 hover:text-red-500"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.attendance.clockin') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 sm:col-12">
                        <label class="db-field-title">{{ __('all.working_from') }}</label>
                        <input type="text" name="title" class="db-field-control @error('title') invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('all.eg_office_home_etc') }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="modal-btns">
                            <button type="submit" class="modal-btn-fill">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>{{ __('all.clock_in') }}</span>
                            </button>
                            <button type="button" class="modal-btn-outline modal-close">
                                <i class="fa-solid fa-circle-xmark"></i>
                                <span>{{ __('all.close') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-content1" class="modal">
    <div class="modal-dialog">
        <div class="modal-header">
            <h3 class="modal-title">{{ __('all.visitor_checkout') }}<span class="clock-span"><i class="icon ti ti-clock-hour-4 font-size-clock-icon"></i></span></h3>
            <button class="text-xl modal-close fa-solid fa-xmark text-slate-400 hover:text-red-500"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.visitor.search') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 sm:col-12">
                        <label class="db-field-title">{{ __('all.visitor_id') }}</label>
                        <input type="text" name="visitorID" class="db-field-control @error('visitorID') invalid @enderror" value="{{ old('visitorID') }}" placeholder="{{ __('all.visitor_id') }}">
                        @error('visitorID')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="modal-btns">
                            <button type="submit" class="modal-btn-fill">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>{{ __('all.check_out') }}</span>
                            </button>
                            <button type="button" class="modal-btn-outline modal-close">
                                <i class="fa-solid fa-circle-xmark"></i>
                                <span>{{ __('all.close') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
