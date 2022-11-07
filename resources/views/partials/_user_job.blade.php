<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">
  	   <a href="{{ route("admin.applyjobs.getsavejob") }}" class="btn btn-success {{ request()->is('admin/applyjobs/getsavejob') || request()->is('admin/applyjobs/getsavejob/*') ? 'active' : '' }}">
        <i class="fa-fw fas fa-list nav-icon">

                        </i>
          
      {{ trans('Saved') }} {{ trans('Jobs') }}
    </a>

    &nbsp;
              <a class="btn btn-success" href="{{ route("admin.applyjobs.getappliedjob") }}" class="btn btn-success {{ request()->is('admin/applyjobs/getappliedjob/') || request()->is('admin/applyjobs/getappliedjob/*') ? 'active' : '' }}">
                 <i class="fa-fw fas fa-list nav-icon">

                        </i>
      {{ trans('Applied') }} {{ trans('Jobs') }}


    </a>

            &nbsp;
                
               @can('naukri_access')
              
                    <a href="{{ route("admin.applyjobs.index") }}" class="btn btn-success {{ request()->is('admin/applyjobs/index') || request()->is('admin/applyjobs/index') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('All Job') }}
                    </a>
              
            @endcan
             &nbsp;
  
  </div>
</div>