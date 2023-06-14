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

                {{-- <li @class(["nav-item" , "menu-open" => Str::contains(Route::currentRouteName() , "appointment")])>
                    <a href="#" @class(["nav-link" , "active" => Str::contains(Route::currentRouteName() , "appointment")])>
                        <i class="nav-icon ahi ahi-i_exam_multiple_choice"></i>
                        <p>
                            @lang('all.appointments')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('appointments.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.index'])>
                            <i class="nav-icon ahi ahi-i_note_action"></i>
                            <p class="text">@lang('all.all_appointments')
                            <span class="right badge badge-warning">{{$all_appointments_count}}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.today')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.today'])>
                            <i class="nav-icon ahi ahi-i_documents_accepted"></i>
                            <p class="text">@lang('all.today_appointments')
                            <span class="right badge badge-success">{{$today_appointments_count}}</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.next')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.next'])>
                            <i class="nav-icon ahi ahi-health_data_sync"></i>
                            <p class="text">@lang('all.next_appointments')
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.yesterday')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.yesterday'])>
                            <i class="nav-icon ahi ahi-i_documents_denied"></i>
                            <p class="text">@lang('all.yesterday_appointments')
                                <span class="right badge badge-danger">{{$yesterday_appointments_count}}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.exited')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.exited'])>
                            <i class="nav-icon ahi ahi-default"></i>
                            <p class="text">@lang('all.exited_appointments')</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('appointment-types.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointment-types.index'])>
                            <i class="nav-icon fa fa-sitemap"></i>
                            <p class="text">@lang('all.appointment_types')</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}



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
                    <a href="{{ route('admin.prices.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.prices.index',
                    ])>
                        <i class="nav-icon fa fa-dollar-sign"></i>
                        <p class="text">@lang('all.prices')
                            <span class="right badge badge-success">{{ $prices_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.states.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.states.index',
                    ])>
                        <i class="nav-icon fa fa-map-marker-alt"></i>
                        <p class="text">@lang('all.states')
                            <span class="right badge badge-warning">{{ $states_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.posts.index',
                    ])>
                        <i class="nav-icon fa fa-paper-plane"></i>
                        <p class="text">@lang('all.posts')
                            <span class="right badge badge-info">{{ $posts_count }}</span>
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

                <li class="nav-item">
                    <a href="{{ route('admin.notifications.index') }}" @class([
                        'nav-link',
                        'active' => Route::currentRouteName() == 'admin.notifications.index',
                    ])>
                        <i class="nav-icon fa fa-bell"></i>
                        <p class="text">@lang('all.notifications')
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
