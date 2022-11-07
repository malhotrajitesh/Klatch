<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">
  	   @can('utalent_access')
               
                    <a href="{{ route("admin.skills.index") }}" class="btn btn-success {{ request()->is('admin/skills') || request()->is('admin/skills/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Skill Master') }}
                    </a>
             
            @endcan

    &nbsp;
                @can('jobdegree_access')
              
                    <a href="{{ route("admin.degrees.index") }}" class="btn btn-success {{ request()->is('admin/degrees') || request()->is('admin/degrees/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Degree') }}
                    </a>
            
            @endcan
            &nbsp;
                    @can('bc_access')
               
                    <a href="{{ route("admin.cbranchs.index") }}" class="btn btn-success {{ request()->is('admin/cbranchs') || request()->is('admin/cbranchs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Branch Master') }}
                    </a>
               
            @endcan
             &nbsp;
                           @can('company_access')
             
                    <a href="{{ route("admin.companys.index") }}" class="btn btn-success {{ request()->is('admin/companys') || request()->is('admin/companys/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Company Master') }}
                    </a>
               
            @endcan
 &nbsp;
                      @can('job_cat_access')
               
                    <a href="{{ route("admin.jobcats.index") }}" class="btn btn-success {{ request()->is('admin/jobcats') || request()->is('admin/jobcats/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Job Category Master') }}
                    </a>
             
            @endcan

             &nbsp;
               @can('job_ent_access')
        
                    <a href="{{ route("admin.adentitys.index") }}" class="btn btn-success {{ request()->is('admin/adentitys') || request()->is('admin/adentitys/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Entity Master') }}
                    </a>
              
            @endcan
   
  
  </div>
</div>