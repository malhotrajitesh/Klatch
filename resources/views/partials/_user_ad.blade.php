<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">


                    <a href="{{ route("admin.buyads.index") }}" class="btn btn-success {{ request()->is('admin/buyads') || request()->is('admin/buyads/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('Buy Ad') }}
                    </a>
              

    &nbsp;
            
  
  </div>
</div>