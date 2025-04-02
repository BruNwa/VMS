{{ Form::model($appointment, ['route' => ['appointment.update', $appointment->id], 'method' => 'PUT', 'id' => 'appointment-form-date', 'enctype' => 'multipart/form-data','class'=>'needs-validation','novalidate', 'data-url' => route('appointment.duration')]) }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('service', __('Service'), ['class' => 'form-label']) }}
                {{ Form::select('service', $service, $appointment->service_id, ['class' => 'form-control service', 'required' => 'required', 'id' => 'service']) }}
                @error('service')
                    <small class="invalid-service" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group appoinment-customer-info">
                {{ Form::label('customer', __('Customer'), ['class' => 'form-label']) }}

                @stack('customer_booking')

                {{ Form::select('customer', $customer, $appointment->customer_id, ['class' => 'form-control']) }}
                @error('customer')
                    <small class="invalid-customer" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('location', __('Location'), ['class' => 'form-label']) }}
                {{ Form::select('location', $location, $appointment->location_id, ['class' => 'form-control', 'required' => 'required']) }}
                @error('location')
                    <small class="invalid-location" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('staff', __('Staff'), ['class' => 'form-label']) }}
                {{ Form::select('staff', $staff, $appointment->staff_id, ['class' => 'form-control', 'required' => 'required']) }}
                @error('staff')
                    <small class="invalid-staff" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('notes', __('Notes'), ['class' => 'form-label']) }}
                {{ Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => __('Enter notes'), 'rows' => '4']) }}
                @error('notes')
                    <small class="invalid-notes" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="appointment_date" class="col-form-label pt-0">{{ __('Appointment Date') }}</label>
            <div class="input-group date ">
                <input class="form-control datepicker p-2 px-3" type="text" id="datepicker" name="appointment_date" placeholder="DD-MM-YYYY"
                    autocomplete="off" required="required" value="{{ $appointment->date }}"
                    data-dates={{ json_encode($combinedArray) }}>
                <span class="input-group-text">
                    <i class="feather icon-calendar"></i>
                </span>
            </div>
        </div>

        <div id="timeSlotsContainer">
            <ul>
                @foreach ($timeSlots as $key => $timeSlot)
                    <li>
                        <label>
                            <input type="radio" name="duration" id="radio{{ $key }}"
                                value="{{ $timeSlot['start'] }}-{{ $timeSlot['end'] }}">
                            <span>{{ $timeSlot['start'] }}-{{ $timeSlot['end'] }}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
        @stack('setting_setup')
    </div>
    <div class="modal-footer pt-3 p-0 gap-3">
        <button type="button" class="btn m-0 btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        {{ Form::submit(__('Update'), ['class' => 'btn m-0 btn-primary']) }}
    </div>
    {{ Form::close() }}
