@extends('admin.setting.index')
@section('admin.setting.breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="custome-breadcrumb">
                {{ Breadcrumbs::render('setting-role-view') }}
            </div>
        </div>
    </div>
@endsection
@section('admin.setting.layout')
    <div class="col-12 md:col-8 xl:col-9">
        <div class="db-card">
            <form action="{{ route('admin.role.save-permission', $role) }}" method="POST">
                @csrf
                <div class="db-card-header">
                    <h3>{{ __('all.permission') }} - <span class="text-danger">( {{ $role->name }} )</span></h3>
                </div>
                <div class="db-table-responsive mb-8">
                    <table class="table db-table stripe">
                        <thead class="db-table-head">
                            <tr class="db-table-head-tr">
                                <th class="db-table-head-th">{{ __('#') }}</th>
                                <th class="db-table-head-th">{{ __('all.module_name') }}</th>
                                <th class="db-table-head-th">{{ __('all.create') }}</th>
                                <th class="db-table-head-th">{{ __('all.edit') }}</th>
                                <th class="db-table-head-th">{{ __('all.delete') }}</th>
                                <th class="db-table-head-th">{{ __('all.show') }}</th>
                            </tr>
                        </thead>
                        <tbody class="db-table-body">
                            <?php if(count($permissionList)) { foreach($permissionList as $permission) { ?>
                            <tr class="db-table-body-tr">
                                <td class="db-table-body-td">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="<?= $permission->name ?>" name="<?= $permission->name ?>"
                                            value="<?= $permission->id ?>"
                                            <?= isset($permissions[$permission->id]) ? 'checked' : '' ?>
                                            onclick="processCheck(this)" class="mainmodule" />
                                    </div>
                                </td>
                                <td class="db-table-body-td" {{ __('Module Name') }}>
                                    <div class="custom-checkbox">
                                        <?= str_replace('-', ' ', ucfirst($permission->name)) ?>
                                    </div>
                                </td>
                                <td class="db-table-body-td" data-title="{{ __('Create') }}">
                                    <div class="custom-checkbox">
                                        <?php
                                                $permissionCreate = $permission->name.'_create';
                                                if(isset($permissionArray[$permissionCreate])) { ?>
                                        <input type="checkbox" id="<?= $permissionCreate ?>" name="<?= $permissionCreate ?>"
                                            value="<?= $permissionArray[$permissionCreate] ?>"
                                            <?= isset($permissions[$permissionArray[$permissionCreate]]) ? 'checked' : '' ?> />
                                        <?php } else {
                                                echo "&nbsp;";
                                            } ?>
                                    </div>
                                </td>
                                <td class="db-table-body-td" data-title="{{ __('Edit') }}">
                                    <div class="custom-checkbox">
                                        <?php
                                                $permissionEdit = $permission->name.'_edit';
                                                if(isset($permissionArray[$permissionEdit])) { ?>
                                        <input type="checkbox" id="<?= $permissionEdit ?>" name="<?= $permissionEdit ?>"
                                            value="<?= $permissionArray[$permissionEdit] ?>"
                                            <?= isset($permissions[$permissionArray[$permissionEdit]]) ? 'checked' : '' ?> />
                                        <?php } else {
                                                echo "&nbsp;";
                                            } ?>
                                    </div>
                                </td>
                                <td class="db-table-body-td" data-title="{{ __('Delete') }}">
                                    <div class="custom-checkbox">
                                        <?php
                                                $permissionDelete = $permission->name.'_delete';
                                                if(isset($permissionArray[$permissionDelete])) { ?>
                                        <input type="checkbox" id="<?= $permissionDelete ?>" name="<?= $permissionDelete ?>"
                                            value="<?= $permissionArray[$permissionDelete] ?>"
                                            <?= isset($permissions[$permissionArray[$permissionDelete]]) ? 'checked' : '' ?> />
                                        <?php } else {
                                                echo "&nbsp;";
                                            } ?>
                                    </div>
                                </td>
                                <td class="db-table-body-td" data-title="{{ __('Show') }}">
                                    <div class="custom-checkbox">
                                        <?php
                                                $permissionShow = $permission->name.'_show';
                                                if(isset($permissionArray[$permissionShow])) { ?>
                                        <input type="checkbox" id="<?= $permissionShow ?>" name="<?= $permissionShow ?>"
                                            value="<?= $permissionArray[$permissionShow] ?>"
                                            <?= isset($permissions[$permissionArray[$permissionShow]]) ? 'checked' : '' ?> />
                                        <?php } else {
                                                echo "&nbsp;";
                                            } ?>
                                    </div>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                <div class="db-card-body">
                    <button class="db-btn text-white bg-primary">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ __('all.button') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.mainmodule').each(function() {
            var mainmodule = $(this).attr('id');

            var mainidCreate = mainmodule + "_create";
            var mainidEdit = mainmodule + "_edit";
            var mainidDelete = mainmodule + "_delete";
            var mainidShow = mainmodule + "_show";

            if (!$('#' + mainmodule).is(':checked')) {
                $('#' + mainidCreate).prop('disabled', true);
                $('#' + mainidCreate).prop('checked', false);

                $('#' + mainidEdit).prop('disabled', true);
                $('#' + mainidEdit).prop('checked', false);

                $('#' + mainidDelete).prop('disabled', true);
                $('#' + mainidDelete).prop('checked', false);

                $('#' + mainidShow).prop('disabled', true);
                $('#' + mainidShow).prop('checked', false);
            }
        });

        function processCheck(event) {
            var mainmodule = $(event).attr('id');
            var mainidCreate = mainmodule + "_create";
            var mainidEdit = mainmodule + "_edit";
            var mainidDelete = mainmodule + "_delete";
            var mainidShow = mainmodule + "_show";

            if ($('#' + mainmodule).is(':checked')) {
                $('#' + mainidCreate).prop('disabled', false);
                $('#' + mainidCreate).prop('checked', true);

                $('#' + mainidEdit).prop('disabled', false);
                $('#' + mainidEdit).prop('checked', true);

                $('#' + mainidDelete).prop('disabled', false);
                $('#' + mainidDelete).prop('checked', true);

                $('#' + mainidShow).prop('disabled', false);
                $('#' + mainidShow).prop('checked', true);
            } else {
                $('#' + mainidCreate).prop('disabled', true);
                $('#' + mainidCreate).prop('checked', false);

                $('#' + mainidEdit).prop('disabled', true);
                $('#' + mainidEdit).prop('checked', false);

                $('#' + mainidDelete).prop('disabled', true);
                $('#' + mainidDelete).prop('checked', false);

                $('#' + mainidShow).prop('disabled', true);
                $('#' + mainidShow).prop('checked', false);
            }
        };
    </script>
@endpush
