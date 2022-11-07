<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan

                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                              @can('cntry_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.countrys.index") }}" class="nav-link {{ request()->is('admin/countrys') || request()->is('admin/countrys/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('Country') }}
                                </a>
                            </li>
                        @endcan
                               <li class="nav-item">
                                <a href="{{ route("admin.settings.index") }}" class="nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('Settings') }}
                                </a>
                            </li>
                    </ul>
                </li>
            @endcan

            
              @can('dash_access')
                <li class="nav-item">
                    <a href="{{ route("admin.dashboards.index") }}" class="nav-link {{ request()->is('admin/dashboards') || request()->is('admin/dashboards/*') ? 'active' : '' }}">
                         <i class="fa-fw fas fa-chart-line nav-icon">

                        </i>
                        {{ trans('Dashboard') }}
                    </a>
                </li>
            @endcan  


        

   
        

                @can('verify_access')
                <li class="nav-item">
                    <a href="{{ route("admin.jobmasters.index") }}" class="nav-link {{ request()->is('admin/adreports') || request()->is('admin/adreports/*') ? 'active' : '' }}">
                         <i class="fa-fw fas fa-chart-line nav-icon">

                        </i>
                        {{ trans('Job Master') }}
                    </a>
                </li>
            @endcan
                  @can('masterev_access')
                <li class="nav-item">
                    <a href="{{ route("admin.events.eventmaster") }}" class="nav-link {{ request()->is('admin/events/eventmaster') || request()->is('admin/events/eventmaster') ? 'active' : '' }}">
                         <i class="fa-fw fas fa-chart-line nav-icon">

                        </i>
                        {{ trans('Event Master') }}
                    </a>
                </li>
            @endcan
         
                    @can('masterfollow_access')
                <li class="nav-item">
                    <a href="{{ route("admin.follows.followmaster") }}" class="nav-link {{ request()->is('admin/follows/followmaster') || request()->is('admin/follows/followmaster') ? 'active' : '' }}">
                         <i class="fa-fw fas fa-chart-line nav-icon">

                        </i>
                        {{ trans('Follow Master') }}
                    </a>
                </li>
            @endcan
         
   

     

          
          
           

                @can('adreport_access')
                <li class="nav-item">
                    <a href="{{ route("admin.adreports.index") }}" class="nav-link {{ request()->is('admin/adreports') || request()->is('admin/adreports/*') ? 'active' : '' }}">
                         <i class="fa-fw fas fa-chart-line nav-icon">

                        </i>
                        {{ trans('Ad Master') }}
                    </a>
                </li>
            @endcan
   

           

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>