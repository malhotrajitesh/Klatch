@extends('layouts.admin')
@section('content')
  <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

 <!--<style type="text/css">


.container
{
  position:relative;
  width:200px;
  display:flex;
  justify-content:space-around;
}
.container .card
{
  position:relative;
  width:250px;
  background:linear-gradient(0deg,#1b1b1b,#222,#1b1b1b);
  display:flex;
  justify-content:center;
  align-items:center;
  height:225px;
  border-radius:4px;
  text-align:center;
  overflow:hidden;
  transition:0.5s;
}
.container .card:hover
{
  transform:translateY(-10px);
  box-shadow:0 15px 35px rgba(0,0,0,.5);
}
.container .card:before
{
  content:'';
  position:absolute;
  top:0;
  left:-50%;
  width:100%;
  height:100%;
  background:rgba(255,255,255,.03);
  pointer-events:none;
  z-index:1;
}
.percent
{
  position:relative;
  width:150px;
  height:150px;
  border-radius:50%;
  box-shadow: inset 0 0 50px #000;
  background:#222;
  z-index:1000;
}
.percent .num
{
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  display:flex;
  justify-content:center;
  align-items:center;
  border-radius:50%;
}
.percent .num h2
{
  color:#f6bc20;
  font-weight:700;
  font-size:40px;
  transition:0.5s;
}
.card:hover .percent .num h2
{
  color:#fff;
  font-size:60px;
}
.percent .num h2 span
{
  color:#f6bc20;
  font-size:24px;
  transition:0.5s;
}
.card:hover .percent .num h2 span
{
  color:#f6bc20;
}
.text
{
  position:relative;
  color:#f6bc20;
  margin-top:20px;
  font-weight:700;
  font-size:18px;
  letter-spacing:1px;
  text-transform:uppercase;
  transition:0.5s;
}
.card:hover .text
{
  color:#f6bc20;
}
svg
{
  position:relative;
  width:150px;
  height:150px;
  z-index:1000;
}
svg circle
{
  width:100%;
  height:100%;
  fill:none;
  stroke:#00ff43;
  stroke-width:10;
  stroke-linecap:round;
  transform:translate(5px,5px);
}
svg circle:nth-child(2)
{
  stroke-dasharray:440;
  stroke-dashoffset:440;
}
.card:nth-child(1) svg circle:nth-child(2)
{
  stroke-dashoffset:calc(440 - (440 * {{ trim($data['cpu'],'%') }}) / 100);
  stroke:red;
}



</style>-->
<!-- <div class="row">
  <div class="col-md-4">
<div class="container">
  <div class="card">
    <div class="box">
      <div class="percent">
        <svg>
          <circle cx="70" cy="70" r="70"></circle>
          <circle cx="70" cy="70" r="70"></circle>
          <svg>
            <div class="num">
              <h2>{{ $data['cpu'] }}<span></span></h2>
            </div>
      </div>
          <h2 class="text">CPU %</h2>
    </div>
  </div>
</div>
</div>
  <div class="col-md-4">
<div class="container">
  <div class="card">
    <div class="box">
      <div class="percent">
        <svg>
          <circle cx="70" cy="70" r="70"></circle>
          <circle cx="70" cy="70" r="70" style="stroke-dashoffset:calc(440 - (440 * {{ trim($data['meminp'],'%') }}) / 100);
  stroke: red;"></circle>
          <svg>
            <div class="num">
              <h2>{{ $data['meminp'] }}<span></span></h2>
            </div>
      </div>
          <h2 class="text">RAM %</h2>
    </div>
  </div>
</div>
</div>

  <div class="col-md-4">
<div class="container">
  <div class="card">
    <div class="box">
      <div class="percent">
       
            <div class="num">
              <h2>Up <span></span>{{ $data['seruptime'] }}</h2>
            </div>
      </div>
          <h2 class="text">RAM GB  {{ $data['memingb'] }}</h2>
    </div>
  </div>
</div>
</div>
</div>-->


        <div class="container-fluid">
     <div class="row">
     	  <div class="card card-stats">
<div class="card-header card-header-warning card-header-icon">
 <select class="year" id="byme" name="year">
            <option value="2022">Year 2022</option>
            <option value="2021">Year 2021</option>
            <option value="2020">Year 2020</option>
        </select>
        <select class="type" name="type">
            <option value="\Ad">Ad</option>
            <option value="\Job">Job</option>
            <option value="\Ivent">Event</option>
            <option value="\Follow">Social</option>
            <option value="\Report">Report</option>
            <option value="\User">User</option>
        </select>

         <select class="clu" id="uchart" name="xmen">
            <option value="bar">bar chart</option>
            <option value="line">line chart</option>
            <option value="pie">pie chart</option>
            <option value="doughnut">donut chart</option>
            <option value="bubble">bubble chart</option>
            <option value="radar">radar chart</option>
             <option value="scatter">scatter chart</option>
           
        </select>
    </div>
   <div style="width: 80%;margin: 0 auto;">
            {!! $chartx->container() !!}
        </div>
        {!! $chartx->script() !!}
     </div>
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
                      <a href="{{ route("admin.adreports.index") }}">Ad</a>
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
                    <a href="{{ route("admin.jobmasters.index") }}">Job</a>
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
                    <a href="{{ route("admin.events.eventmaster") }}">Event</a>
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
                      <a href="{{ route("admin.follows.followmaster") }}">Follow Me</a>
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
                
                      <h4 class="card-title">Reports</h4> <br />
                  <p class="card-text">YTD <br />{{ $data['cp_total'] }}</p>
                      <p class="card-text">MTD <br /> {{ $data['cp_month']}}</p>
                       <p class="card-text">W <br /> {{ $data['cp_week'] }}</p>
                       <p class="card-text">T <br /> {{ $data['cp_today'] }}</p>
                    </div>
                   <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-danger">home_work</i>
                        <a href="{{ route("admin.reports.index") }}">Reports</a>
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

      <script type="text/javascript">
            var original_api_url = {{ $chartx->id }}_api_url;
            $(".type").change(function(){
                var utrk = $(this).val();
                var year = $('#byme').val();
                var uch = $('#uchart').val();
                if(year != '' && utrk != ''){
               {{ $chartx->id }}_refresh(original_api_url + "?year="+year+"&utrk="+utrk+"&uch="+uch);
                }
                
            });
        </script>
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "{{ config('panel.date_format_js') }}"
      })
</script>
@stop