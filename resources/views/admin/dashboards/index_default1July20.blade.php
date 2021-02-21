@extends('layouts.admin')
@section('content')
 <div class="row">
        <div class="col-lg-3 col-xs-6">
<h3 style="background: blue; color:white;"> Name </h3>
</div>
<div class="col-lg-2 col-xs-6">
<h3 style="background: blue; color:white;"> Today </h3>
</div>
<div class="col-lg-2 col-xs-6">
<h3 style="background: blue; color:white;"> Weekly </h3>
</div>
<div class="col-lg-2 col-xs-6">
<h3 style="background: blue; color:white;"> Monthly </h3>
</div>
<div class="col-lg-2 col-xs-6">
<h3 style="background: blue; color:white;"> Total </h3>
</div>
</div>

@can('bill_access')
    <div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Gate In</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['sales_transactions'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['g_week'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['suppliers'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['customers'] }}</h2>
        </div>
      </div>
 @endcan
 @can('gateout_access')
  
 <div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Gate Out</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['out_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['out_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['out_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['out_total'] }}</h2>
        </div>
      </div>
@endcan
 
 @can('sup_access')
       <div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Superviser</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['send_today'] }}</h2>
        </div>
        
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['send_week'] }}</h2>
        </div>
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['send_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['send_total'] }}</h2>
        </div>
      </div>
      @endcan 
@can('gate_access')
<div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Super Admin</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['r_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['r_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['r_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['r_total'] }}</h2>
        </div>
      </div>
 @endcan
 @can('verifier_access')
<div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Stock Verifer</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['v_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['v_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['v_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['v_total'] }}</h2>
        </div>
      </div>
@endcan
@can('bom_access')
<div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Semi Finished Bill</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['sfp_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['sfp_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['sfp_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['sfp_total'] }}</h2>
        </div>
      </div>
 @endcan
                                    @can('final_access')
      <div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Finished Bill</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['fp_today'] }}</h2>
        </div>
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['fp_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['fp_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['fp_total'] }}</h2>
        </div>
      </div>
       @endcan
@can('finance_access') 
   <div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Finance</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['fi_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['fi_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['fi_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['fi_total'] }}</h2>
        </div>
      </div>
@endcan


@can('rawpro_access') 
   <div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Raw Mateial</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['rp_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['rp_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['rp_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['rp_total'] }}</h2>
        </div>
      </div>
@endcan


@can('spro_access')
<div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Semi  Product</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['sfm_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['sfm_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['sfm_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['sfm_total'] }}</h2>
        </div>
      </div>
 @endcan

 @can('fproduct_access')
<div class="row">
       <div class="col-lg-3 col-xs-8">
              <h2  style="background: linear-gradient(180deg,#ff8a00,#e52e71); color:white;">Finished Product</h2>
          </div>

        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#1DE9B6,#e52e71); color:white;">{{ $data['fm_today'] }}</h2>
        </div>
         <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(40deg,#2096ff,#05ffa3); color:white;">{{ $data['fm_week'] }}</h2>
        </div>
        
        <div class="col-lg-2 col-xs-6">
              <h2 align="right" style="background: linear-gradient(180deg,#e52e71,#6200EA); color:white;">{{ $data['fm_month'] }}</h2>
        </div>
       
        <div class="col-lg-2 col-xs-6">
              <h2 align="right"style="background: linear-gradient(180deg,#e52e71,#DD2C00); color:white;">{{ $data['fm_total'] }}</h2>
        </div>
      </div>
 @endcan

  <div class="row">

  <div class="col-md-6">
            <div class="panel panel-primary dsPanel">
            <div class="panel-heading"><i class="fa fa-pie-chart"></i> tEST </div>
            <div class="panel-body" >
              <canvas id="demanding_quizzes" width="100" height="60"></canvas>
            </div>
          </div>
        </div>
        
        
        <div class="col-md-6">
            <div class="panel panel-primary dsPanel">
            <div class="panel-heading"><i class="fa fa-pie-chart"></i> USER</div>
            <div class="panel-body" >
              <canvas id="demanding_paid_quizzes" width="100" height="60"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-6 col-lg-5">
            <div class="panel panel-primary dsPanel">
            <div class="panel-heading"><i class="fa fa-bar-chart-o"></i> </div>
            <div class="panel-body" >
              <canvas id="payments_chart" width="100" height="60"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="panel panel-primary dsPanel">
            <div class="panel-heading"><i class="fa fa-bar-chart-o"></i></div>
            <div class="panel-body" >
            
        
            
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <canvas id="" width="100" height="110"></canvas>
                </div>
              </div>
            </div>

           r
            </div>
          </div>
        </div>


        <div class="col-md-6 col-lg-4">
            <div class="panel panel-primary dsPanel">
            <div class="panel-heading"><i class="fa  fa-line-chart"></i> </div>
            <div class="panel-body" >
              <canvas id="payments_monthly_chart" width="100" height="60"></canvas>
            </div>
          </div>
        </div>

<!-- Test Modal 

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
  
   $(window).load(function(){        
   $('#myModal').modal('show');
    }); 
</script>


 Modal -->



@endsection

@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "{{ config('panel.date_format_js') }}"
      })
</script>
@stop