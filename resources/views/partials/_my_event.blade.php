<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">
  	 
               
                    <a href="{{ route("admin.applyevents.getsaveevent") }}" class="btn btn-success {{ request()->is('admin/applyevents/getsaveevent') || request()->is('admin/applyevents/getsaveevent/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                       {{ trans('Saved') }} {{ trans('Events') }}
                    </a>
          

    &nbsp;
          <a href="{{ route("admin.applyevents.appliedevent") }}" class="btn btn-success {{ request()->is('admin/applyevents/appliedevent') || request()->is('admin/applyevents/appliedevent/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                       {{ trans('Applied') }} {{ trans('Events') }}
                    </a>
                    &nbsp;
                            @can('applyeven_access')
             
                    <a href="{{ route("admin.applyevents.index") }}" class="btn btn-success {{ request()->is('admin/applyevents') || request()->is('admin/applyevents/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('All Events') }}
                    </a>
              
            @endcan
     
               
  
  </div>
</div>