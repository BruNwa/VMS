@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-email-template-setting') }}
            </div>
        </div>
    </div>
@endsection

@section('admin.setting.layout')
<div class="col-12 md:col-8 xl:col-9">
    <div class="db-card">
        <div class="db-card-header">
            <h3 class="db-card-title">{{ __('all.template') }}</h3>
        </div>
        <div class="db-card-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.setting.email-template-update') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label class="db-field-title">{{__('all.notifications_templates')}}</label>
                        <textarea class="db-field-control" name="notify_templates" id="editor">{{ setting('notify_templates') }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="db-field-title">{{__('all.invite_templates')}}</label>
                        <textarea class="db-field-control" name="invite_templates" id="editor1">{{setting('invite_templates')}}</textarea>
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


@push('css')
    <style>
        .ck-editor__editable {
            height: 200px !important;
            min-height: 200px !important;
            max-height: 200px !important;
            overflow-y: scroll !important;
            border: 1px solid #ccc !important;
            border-radius: 5px;
        }
        .ck-editor__editable:focus {
            outline: none !important;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    shouldNotGroupWhenFull: true
                },
                removePlugins: ['ResizeObserver'],
            })
            .then(editor => {
                const editableElement = editor.ui.view.editable.element;
                editableElement.style.height = "200px";
                editableElement.style.minHeight = "200px";
                editableElement.style.maxHeight = "200px";
                editableElement.style.overflowY = "scroll";
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'), {
                toolbar: {
                    shouldNotGroupWhenFull: true
                },
                removePlugins: ['ResizeObserver'],
            })
            .then(editor => {
                const editableElement = editor.ui.view.editable.element;
                editableElement.style.height = "200px";
                editableElement.style.minHeight = "200px";
                editableElement.style.maxHeight = "200px";
                editableElement.style.overflowY = "scroll";
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
