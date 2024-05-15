<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        {{ config('admin.name', 'Administrator') }}
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body ps">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            @can('dashboard-index')
            <li class="nav-item active">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box link-icon">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <span class="link-title">{{ __('admin.Dashboard') }}</span>
                </a>
            </li>
            @endcan
            @can('rolemanagement-index')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#rolemanagement" role="button" aria-expanded="false" aria-controls="rolemanagement">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">{{ __('admin.Roles') }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="rolemanagement">
                    <ul class="nav sub-menu">
                        @can('rolemanagement-index')
                            <li class="nav-item">
                                <a href="{{ route('role-management.index') }}" class="nav-link">{{ __('admin.Roles Management') }}</a>
                            </li>
                        @endcan
                        @can('rolemanagement-create')
                            <li class="nav-item">
                                <a href="{{ route('role-management.create') }}" class="nav-link">{{ __('admin.New Role') }}</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('adminmanagement-index')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#adminmanagement" role="button" aria-expanded="false" aria-controls="adminmanagement">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">{{ __('admin.Admins') }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="adminmanagement">
                    <ul class="nav sub-menu">
                        @can('adminmanagement-index')
                            <li class="nav-item">
                                <a href="{{ route('admin-management.index') }}" class="nav-link">{{ __('admin.Admin Management') }}</a>
                            </li>
                        @endcan
                        @can('adminmanagement-create')
                            <li class="nav-item">
                                <a href="{{ route('admin-management.create') }}" class="nav-link">{{ __('admin.Create New Account') }}</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('usermanagement-index')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#usermanagement" role="button" aria-expanded="false" aria-controls="usermanagement">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="link-title">{{ __('admin.Users') }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="usermanagement">
                    <ul class="nav sub-menu">
                        @can('usermanagement-index')
                            <li class="nav-item">
                                <a href="{{ route('user-management.index') }}" class="nav-link">{{ __('admin.User Management') }}</a>
                            </li>
                        @endcan
                        @can('usermanagement-create')
                            <li class="nav-item">
                                <a href="{{ route('user-management.create') }}" class="nav-link">{{ __('admin.Create New User') }}</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('postmanagement-index')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#postmanagement" role="button" aria-expanded="false" aria-controls="postmanagement">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">{{ __('admin.Posts') }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="postmanagement">
                    <ul class="nav sub-menu">
                        @can('postmanagement-index')
                            <li class="nav-item">
                                <a href="{{ route('post-management.index') }}" class="nav-link">{{ __('admin.Posts Management') }}</a>
                            </li>
                        @endcan
                        @can('postmanagement-create')
                            <li class="nav-item">
                                <a href="{{ route('post-management.create') }}" class="nav-link">{{ __('admin.Create New Post') }}</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</nav>