    <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="color:#fff;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 
         {{ Auth::user()->name }}  
        </a>
        <small style="color:#fff;">Member Since {{ Auth::user()->created_at->toFormattedDateString() }}</small>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @can('ubio_access')
               
                    <a href="{{ route("admin.profiles.index") }}" class="dropdown-item {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">
                        <i class="fa fa-user-circle-o nav-icon">

                        </i>
                        {{ trans('My Profile') }}
                    </a>
              
            @endcan

            
                    <a href="{{ route("admin.ads.index") }}" class="dropdown-item {{ request()->is('admin/ads') || request()->is('admin/ads/*') ? 'active' : '' }}">
                        <i class="fa fa-cart-plus nav-icon">

                        </i>
                        {{ trans('My Ads') }}
                    </a>
              

              @can('ujob_access')
              
                    <a href="{{ route("admin.jobs.index") }}" class="dropdown-item {{ request()->is('admin/jobs') || request()->is('admin/jobs/*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase nav-icon">

                        </i>

                        {{ trans('My Jobs') }}
                    </a>
            
            @endcan
                @can('episode_access')
             
                    <a href="{{ route("admin.events.index") }}" class="dropdown-item {{ request()->is('admin/events') || request()->is('admin/events/*') ? 'active' : '' }}">
                        <i class="fas fa-grin-stars nav-icon">

                        </i>

                        {{ trans('My Events') }}
                    </a>
               
            @endcan

                 @can('like_access')
           
                    <a href="{{ route("admin.follows.index") }}" class="dropdown-item {{ request()->is('admin/follows') || request()->is('admin/follows/*') ? 'active' : '' }}">
                        <i class="fas fa-smile-beam nav-icon">

                        </i>

                        {{ trans('Follow Me') }}
                    </a>
          
            @endcan
        
        </div>
      </li>    
                    </ul>
          

    &nbsp;
        
     
               
