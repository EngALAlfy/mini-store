
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/photos/users') . '/' . auth()->user()->photo }}"
                    onerror="this.src='{{ asset('assets/img/user.png') }}'" alt="{{ auth()->user()->name }}"
                    class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.home',
                    ])>
                        <i class="nav-icon fa fa-home"></i>
                        <p class="text">@lang('all.home')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.categories.index',
                    ])>
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>@lang('all.categories')
                            <span class="right badge badge-danger">{{ $categories_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sub-categories.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.sub-categories.index',
                    ])>
                        <i class="nav-icon fa fa-list"></i>
                        <p class="text">@lang('all.sub_categories')
                            <span class="right badge badge-success">{{ $sub_categories_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.products.index',
                    ])>
                        <i class="nav-icon fa fa-box-open"></i>
                        <p class="text">@lang('all.products')
                            <span class="right badge badge-warning">{{ $products_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.orders.index',
                    ])>
                        <i class="nav-icon fa fa-paper-plane"></i>
                        <p class="text">@lang('all.orders')
                            <span class="right badge badge-info">{{ $orders_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.pages.index',
                    ])>
                        <i class="nav-icon fab fa-html5"></i>
                        <p class="text">@lang('all.pages')
                            <span class="right badge badge-secondary">{{ $pages_count }}</span>
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.contacts.index',
                    ])>
                        <i class="nav-icon fa fa-sms"></i>
                        <p class="text">@lang('all.contacts')
                            <span class="right badge badge-danger">{{ $contacts_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-header">@lang('all.settings')</li>

                <li @class([
                    'nav-item',
                    'menu-open' => Str::contains(Route::currentRouteName(), 'users'),
                ])>
                    <a href="#" @class([
                        'nav-link',
                        'active' => Str::contains(Route::currentRouteName(), 'users'),
                    ])>
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            @lang('all.users')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" @class([
                                'nav-link',
                                'active' => Route::currentRouteName() == 'admin.users.index',
                            ])>
                                <i class="nav-icon fa fa-users"></i>
                                <p class="text">@lang('all.users')</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" @class([
                                'nav-link',
                                'active' => Route::currentRouteName() == 'admin.users.create',
                            ])>
                                <i class="nav-icon fa fa-plus"></i>
                                <p class="text">@lang('all.add')</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.settings',
                    ])>
                        <i class="nav-icon ahi ahi-ui_settings"></i>
                        <p class="text">@lang('all.settings')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.profile',
                    ])>
                        <i class="nav-icon ahi ahi-ui_user_profile"></i>
                        <p class="text">@lang('all.profile')</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('logout') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'sign_out',
                    ])>
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p class="text">@lang('all.sign_out')</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
