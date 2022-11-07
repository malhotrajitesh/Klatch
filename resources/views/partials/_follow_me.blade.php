<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">
  	   @can('unlike_access')
               
                    <a href="{{ route("admin.applyfollows.index") }}" class="btn btn-success {{ request()->is('admin/applyfollows') || request()->is('admin/applyfollows/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Follow Me') }}
                    </a>
          
            @endcan

    &nbsp;
               
  
  </div>
</div>