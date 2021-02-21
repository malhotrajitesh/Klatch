<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">
  	 
            @can('a_category_access')
                
                    <a href="{{ route("admin.adcats.index") }}" class="btn btn-success {{ request()->is('admin/adcats') || request()->is('admin/adcats/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Ad Category') }}
                    </a>
             
            @endcan

    &nbsp;
                     @can('sub_access')
               
                    <a href="{{ route("admin.adscats.index") }}" class="btn btn-success {{ request()->is('admin/adscats') || request()->is('admin/adscats/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Ad Sub Category') }}
                    </a>
              
            @endcan
            &nbsp;
                
         
        
  
  </div>
</div>