@php

$menuLinks = [
    'Dashboard' => [
        'route' => route('dashboard'),
        'icon' => 'fas fa-tachometer-alt',
    ],
    'Menu Groups' => [
        'route' => route('menugroup.index'),
        'icon' => 'fas fa-folder',
    ],
    'Main Menues' => [
        'route' => route('mainmenu.index'),
        'icon' => 'fas fa-bars',
    ],
    'Menu Sections' => [
        'route' => route('menusection.index'),
        'icon' => 'fas fa-th-large',
    ],

    'Sub Section Links' => [
        'route' => route('sectionlink.index'),
        'icon' => 'fas fa-list-ul',
    ],


    'Users' => [
        'route' => route('users'),
        'icon' => 'fa fa-users',
    ],
];

@endphp
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                @foreach ($menuLinks as $menuTitle => $menu)
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ $menu['route'] }}" aria-expanded="false">
                            <i class="{{ $menu['icon'] }}" aria-hidden="true"></i>
                            <span class="hide-menu"> {{$menuTitle}} </span>
                        </a>
                    </li>
                @endforeach

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('optimize') }}" aria-expanded="false">
                        <i class="fa fa-code" aria-hidden="true"></i>
                        <span class="hide-menu"> Optimize Application <span class="text-danger">*</span></span>
                    </a>
                    <div class="small text-danger text-center">* DO NOT CLICK: For developers use only</div>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
