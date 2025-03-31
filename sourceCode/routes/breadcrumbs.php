<?php

use Diglactic\Breadcrumbs\Breadcrumbs;



// Home
Breadcrumbs::for ('dashboard', function ($trail) {
    $trail->push(trans('validation.attributes.dashboard'), route('admin.dashboard.index'));
});

Breadcrumbs::for ('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.profile'));
});

Breadcrumbs::for('profile_edit', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.profile_edit'));
});

Breadcrumbs::for('change_pass', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.change_pass'));
});

Breadcrumbs::for ('attendance', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.attendance'));
});

// Dashboard / Setting
Breadcrumbs::for ('setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.settings'), route('admin.setting.index'));
});

// Dashboard / Email Setting
Breadcrumbs::for ('sms', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.sms'));
});

// Dashboard / Email Setting
Breadcrumbs::for ('emailsetting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.emailsettings'));
});

// Dashboard / SMS Setting
Breadcrumbs::for ('smssetting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.smssetting'));
});

// Dashboard / FCM-notification Setting
Breadcrumbs::for ('fcm_settings', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.fcm_settings'));
});

// Dashboard / SMS Setting
Breadcrumbs::for ('setting-notificationsetting', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.notificationsetting'));
});

// Dashboard / Departments
Breadcrumbs::for ('departments', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.departments'), route('admin.departments.index'));
});

// Dashboard / Departments / Add
Breadcrumbs::for ('departments/add', function ($trail) {
    $trail->parent('departments');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Departments / Edit
Breadcrumbs::for ('departments/edit', function ($trail) {
    $trail->parent('departments');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Designations
Breadcrumbs::for ('designations', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.designations'), route('admin.designations.index'));
});

// Dashboard / Departments / Add
Breadcrumbs::for ('designations/add', function ($trail) {
    $trail->parent('designations');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Departments / Edit
Breadcrumbs::for ('designations/edit', function ($trail) {
    $trail->parent('designations');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Employees
Breadcrumbs::for ('employees', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.employees'), route('admin.employees.index'));
});

// Dashboard / employees / Add
Breadcrumbs::for ('employees/add', function ($trail) {
    $trail->parent('employees');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / employees / Edit
Breadcrumbs::for ('employees/edit', function ($trail) {
    $trail->parent('employees');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / employees / Show
Breadcrumbs::for ('employees/show', function ($trail) {
    $trail->parent('employees');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / employees / Show
Breadcrumbs::for ('employee_report', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.employee_report'));
});

// Dashboard / pre-registers
Breadcrumbs::for ('pre-registers', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.pre-registers'), route('admin.pre-registers.index'));
});

// Dashboard / pre-registers / Add
Breadcrumbs::for ('pre-registers/add', function ($trail) {
    $trail->parent('pre-registers');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / pre-registers / Edit
Breadcrumbs::for ('pre-registers/edit', function ($trail) {
    $trail->parent('pre-registers');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / pre-registers / Show
Breadcrumbs::for ('pre-registers/show', function ($trail) {
    $trail->parent('pre-registers');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / visitors
Breadcrumbs::for ('visitors', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.visitors'), route('admin.visitors.index'));
});

// Dashboard / pre-registers / Add
Breadcrumbs::for ('visitors/add', function ($trail) {
    $trail->parent('visitors');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / visitors / Edit
Breadcrumbs::for ('visitors/edit', function ($trail) {
    $trail->parent('visitors');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / visitors / Show
Breadcrumbs::for ('visitors/show', function ($trail) {
    $trail->parent('visitors');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / Administrators
Breadcrumbs::for ('administrators', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.administrators'), route('admin.adminusers.index'));
});

// Dashboard / Administrators / Edit
Breadcrumbs::for ('administrators/add', function ($trail) {
    $trail->parent('administrators');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Administrators / Edit
Breadcrumbs::for ('administrators/edit', function ($trail) {
    $trail->parent('administrators');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Administrators / Edit
Breadcrumbs::for ('administrators/view', function ($trail) {
    $trail->parent('administrators');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / Role
Breadcrumbs::for ('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.roles'), route('admin.role.index'));
});

// Dashboard / Role / Add
Breadcrumbs::for ('role/add', function ($trail) {
    $trail->parent('roles');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Role / Edit
Breadcrumbs::for ('role/edit', function ($trail) {
    $trail->parent('roles');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Role / View
Breadcrumbs::for ('role/view', function ($trail) {
    $trail->parent('roles');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / SupperAdmin
Breadcrumbs::for('superadmin', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.superadmin'), route('admin.superadmin.index'));
});

// Dashboard / SupperAdmin / Add
Breadcrumbs::for('superadmin/add', function ($trail) {
    $trail->parent('superadmin');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / SupperAdmin / Edit
Breadcrumbs::for('superadmin/edit', function ($trail) {
    $trail->parent('superadmin');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / SupperAdmin / View
Breadcrumbs::for('superadmin/view', function ($trail) {
    $trail->parent('superadmin');
    $trail->push(trans('validation.attributes.view'));
});


// Setting Module
Breadcrumbs::for ('setting-site', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.site'));
});

//WhatsApp
Breadcrumbs::for ('setting-whatsApp-setting', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.whatsapp_settings'));
});

//Theme
Breadcrumbs::for('setting-theme-setting', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.theme'));
});

// Setting Module
Breadcrumbs::for ('setting-email-setting', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.email_settings'));
});
// Setting Module
Breadcrumbs::for ('setting-email-template-setting', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.email-template-setting'));
});

// Setting language
Breadcrumbs::for ('setting-language', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.language'));
});
Breadcrumbs::for ('setting-language-create', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.language_create'));
});
Breadcrumbs::for ('setting-language-edit', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.language_edit'));
});

// Setting / Role
Breadcrumbs::for ('setting-role', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.roles'), route('admin.role.index'));
});

// Setting / Role / Add
Breadcrumbs::for ('setting-role-create', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.role_add'));
});

// Setting / Role / Edit
Breadcrumbs::for ('setting-role-edit', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.role_edit'));
});

// Setting / Role / View
Breadcrumbs::for ('setting-role-view', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.role_view'));
});

// Setting Module
Breadcrumbs::for ('setting-front-end-setting', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.front-end_settings'));
});

// Page Module
Breadcrumbs::for ('setting-page', function ($trail) {
    $trail->parent('setting');
    $trail->push(trans('validation.attributes.page'));
});

// Dashboard / addons
Breadcrumbs::for ('addons', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.addons'), route('admin.addons.index'));
});

// Dashboard / addons / Add
Breadcrumbs::for ('addons/add', function ($trail) {
    $trail->parent('addons');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / addons / Edit
Breadcrumbs::for ('addons/edit', function ($trail) {
    $trail->parent('addons');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / addons / View
Breadcrumbs::for ('addons/view', function ($trail) {
    $trail->parent('addons');
    $trail->push(trans('validation.attributes.view'));
});

//report
Breadcrumbs::for('visitor-report', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.visitor_report'));
});

Breadcrumbs::for('pre-registers-report', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.pre_registers_report'));
});

Breadcrumbs::for('attendance-report', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.attendance_report'));
});
