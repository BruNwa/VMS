<?php

namespace App\Listeners;

use App\Events\SuperAdminSettingMenuEvent;

class SuperAdminSettingMenuListener
{
    /**
     * Handle the event.
     */
    public function handle(SuperAdminSettingMenuEvent $event): void
    {
        $module = 'Base';
        $menu = $event->menu;
        $menu->add([
            'title' => __('Brand Settings'),
            'name' => 'brand-settings',
            'order' => 10,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'site-settings',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('System Settings'),
            'name' => 'system-settings',
            'order' => 20,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'system-settings',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Currency Settings'),
            'name' => 'currency-settings',
            'order' => 25,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'currency-settings',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Cookie Settings'),
            'name' => 'cookie-settings',
            'order' => 30,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'cookie-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Storage Settings'),
            'name' => 'storage-settings',
            'order' => 70,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'storage-sidenav',
            'module' => $module,
            'permission' => 'setting storage manage'
        ]);

        $menu->add([
            'title' => __('Email Settings'),
            'name' => 'email-settings',
            'order' => 500,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'email-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Email Notification Settings'),
            'name' => 'email-notification-settings',
            'order' => 510,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'email-notification-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('SEO Settings'),
            'name' => 'seo-settings',
            'order' => 80,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'seo-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Cache Settings'),
            'name' => 'cache-settings',
            'order' => 90,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'cache-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Custom JS'),
            'name' => 'custom-js',
            'order' => 100,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'custom-js-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Custom CSS'),
            'name' => 'custom-css',
            'order' => 110,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'custom-css-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
        $menu->add([
            'title' => __('Bank Transfer'),
            'name' => 'bank-transfer-settings',
            'order' => 1000,
            'ignore_if' => [],
            'depend_on' => [],
            'route' => '',
            'navigation' => 'bank-transfer-sidenav',
            'module' => $module,
            'permission' => 'setting manage'
        ]);
    }
}
