@extends('layouts.admin')
@section('content')
  <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


  <div class="container-fluid">
     <div class="row">
        <div class="col-6">
       <div style="width: 80%;margin: 0 auto;">
            {!! $chart->container() !!}
        </div>
       
        {!! $chart->script() !!}
      </div>
         <div class="col-6">
       <div style="width: 80%;margin: 0 auto;">
            {!! $chart1->container() !!}
        </div>
       
        {!! $chart1->script() !!}
      </div>

</div>

       <div class="row">
 @can('user_access')
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">local_atm</i>
                    </div>
                   
                    <h4 class="card-title">User </h4> <br />
                     <p class="card-text">YTD <br />{{ $data['u_total'] }}</p>
                      <p class="card-text"> MTD <br /> {{ $data['u_month']}}</p>
                       <p class="card-text">W <br />{{ $data['u_week'] }}</p>
                        <p class="card-text">T <br />{{  $data['u_today'] }}</p>

                    

                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">local_atm</i>
                      <a href="{{ route("admin.users.index") }}">User</a>
                    </div>
                  </div>
                </div>
            </div>

 @endcan
                         
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">layers</i>
                    </div>
                
                     <h4 class="card-title">Ad </h4> <br />
                    <p class="card-text"> YTD <br />{{ $data['Ad_total'] }}</p>
                      <p class="card-text">MTD <br /> {{ $data['ad_month']}}</p>
                       <p class="card-text">W <br /> {{ $data['ad_week'] }}</p>
                       <p class="card-text">T <br /> {{  $data['ad_today'] }}</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">layers</i>
                      <a href="{{ route("admin.ads.index") }}">Ad</a>
                    </div>
                  </div>
                </div>
            </div>
              
                         
                          

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
               
                      <h4 class="card-title">Job</h4> <br />
                
                       <p class="card-text">YTD <br />{{ $data['jb_total'] }}</p>
                      <p class="card-text">MTD <br /> {{ $data['jb_month']}}</p>
                       <p class="card-text">W <br /> {{ $data['jb_week'] }}</p>
                        <p class="card-text">T <br /> {{ $data['jb_today'] }}</p>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">info_outline</i>
                    <a href="{{ route("admin.jobs.index") }}">Job</a>
                  </div>
                </div>
              </div>
            </div>
          
                          
          </div>
<div class="row">
   
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">face</i>
                  </div>
              
                  <h4 class="card-title">Event</h4> <br />
                  <p class="card-text">YTD <br />{{ $data['et_total'] }}</p>
                      <p class="card-text">MTD <br /> {{ $data['et_month']}}</p>
                       <p class="card-text">W <br /> {{ $data['et_week'] }}</p>
                       <p class="card-text">T <br /> {{ $data['et_today']  }}</p>
                </div>
                 <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">face</i>
                    <a href="{{ route("admin.events.index") }}">Event</a>
                  </div>
                </div>
              </div>
            </div>

    
                            
    
             

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">store</i>
                    </div>
                    
                     <h4 class="card-title">Follow Me</h4> <br />
                  <p class="card-text">YTD <br />{{ $data['fol_total'] }}</p>
                      <p class="card-text">MTD <br /> {{ $data['fol_month']}}</p>
                       <p class="card-text">W <br /> {{ $data['fol_week'] }}</p>
                        <p class="card-text">T <br /> {{ $data['fol_today']  }}</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">store</i>
                      <a href="{{ route("admin.follows.index") }}">Follow Me</a>
                    </div>
                  </div>
                </div>
              </div>
           


              <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">home_work</i>
                      </div>
                
                      <h4 class="card-title">Company</h4> <br />
                  <p class="card-text">YTD <br />{{ $data['cp_total'] }}</p>
                      <p class="card-text">MTD <br /> {{ $data['cp_month']}}</p>
                       <p class="card-text">W <br /> {{ $data['cp_week'] }}</p>
                       <p class="card-text">T <br /> {{ $data['cp_today'] }}</p>
                    </div>
                   <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-danger">home_work</i>
                        <a href="{{ route("admin.companys.index") }}">Company</a>
                      </div>
                    </div>
                  </div>
              </div>
            
            </div>


<div class="row">
          
 

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">face</i>
                    </div>
                   
                       <h4 class="card-title">Profile </h4> <br />
                  <p class="card-text">YTD <br />{{ $data['pro_total'] }}</p>
                      <p class="card-text">MTD <br /> {{ $data['pro_month']}}</p>
                       <p class="card-text">W <br /> {{ $data['pro_week'] }}</p>
                       <p class="card-text">T <br /> {{$data['pro_today']  }}</p>
                  </div>
                   <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">face</i>
                      <a href="{{ route("admin.profiles.index") }}">Profile</a>
                    </div>
                  </div>
                </div>
              
              </div>

        
          </div>
           

          
        
  </div>



@endsection

@section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "{{ config('panel.date_format_js') }}"
      })
</script>
@stop