{{Form::model($appointment,array('route' => array('appointment.status.update', $appointment->id), 'id' => 'business-edit-form','enctype' => 'multipart/form-data')) }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}
                {{ Form::select('status', $CustomStatus, $appointment->appointment_status, ['class' => 'form-control', 'required' => 'required']) }}
                @error('status')
                    <small class="invalid-status" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
        </div>

    </div>
    <div class="modal-footer gap-3 pt-3 p-0">
        <button type="button" class="btn m-0 btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        {{ Form::submit(__('Update'), ['class' => 'btn m-0 btn-primary']) }}
    </div>
    {{ Form::close() }}

