<div id="modal-content" class="modal">
    <div class="modal-dialog">
        <div class="modal-header">
            <h3 class="modal-title">{{ __('all.clock_in') }} - <span class="clock-span"><i class="icon ti ti-clock-hour-4 font-size-clock-icon"></i>{{ date('g:i A') }}</span></h3>
            <button class="modal-close fa-solid fa-xmark text-xl text-slate-400 hover:text-red-500"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.attendance.clockin') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 sm:col-12">
                        <label class="db-field-title">{{ __('all.working_from') }}</label>
                        <input type="text" name="title" class="db-field-control @error('title') invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('attendance.eg_office_home_etc') }}">
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
