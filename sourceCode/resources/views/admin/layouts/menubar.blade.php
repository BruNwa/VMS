<aside class="db-sidebar">
    <div class="db-sidebar-header">
        <a href="#" class="w-24"><img src="{{ themeSetting('site_logo') ? themeSetting('site_logo')->logo : asset('images/site_logo.png') }}" alt="logo"></a>
        <button class="fa-solid fa-xmark xmark-btn"></button>
    </div>
    <nav class="db-sidebar-nav">
        @foreach ($backendMenus as $menu)
            @if ($menu['link'] === '#' && isset($menu['child']) && count($menu['child']) > 0)
                <h5 class="db-sidebar-nav-title">{{ trans('menu.' . $menu['name']) }}</h5>
                <ul class="db-sidebar-nav-list">
                    @foreach ($menu['child'] as $child)
                        <li class="db-sidebar-nav-item @if(request()->segment(2) === $child['link']) active @elseif(request()->segment(3) != "" && request()->segment(2) ."/". request()->segment(3) === $child['link']) active @else '' @endif">
                            <a href="{{ url('admin/' . $child['link']) }}" class="db-sidebar-nav-menu">
                                <i class="{{ $child['icon'] ?? '' }} text-sm"></i>
                                <span>{{ trans('menu.' . $child['name']) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @elseif ($menu['link'] !== '#')
                <ul class="db-sidebar-nav-list">
                    <li class="db-sidebar-nav-item @if(request()->segment(2) === $menu['link']) active @elseif(request()->segment(3) != "" && request()->segment(2) ."/". request()->segment(3) === $menu['link']) active @else '' @endif">
                        <a href="{{ url('admin/' . $menu['link']) }}" class="db-sidebar-nav-menu">
                            <i class="{{ $menu['icon'] ?? '' }} text-sm"></i>
                            <span>{{ trans('menu.' . $menu['name']) }}</span>
                        </a>
                    </li>
                </ul>
            @endif
        @endforeach
    </nav>
</aside>
