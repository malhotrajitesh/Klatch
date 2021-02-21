@extends('layouts.admin')
@section('content')

<div class="card">
  <div class="card-header">
    {{ trans('global.create') }} {{ trans('ivent') }}
  </div>

  <div class="card-body">
         <div style="margin-bottom: 10px;" class="row">

       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
      </div>
      @endif

      @if(count($errors)>0)
      <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
        <ul>
          @foreach($errors->all() as $error)
          <li style="list-style: none;">{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

    </div>

    <div class="card">
      <div class="card-header">
        {{ trans('Events Details') }} {{ trans('global.list') }}
      </div>
      <div class="card-body col-lg-6">
    <form action="{{ route("admin.events.postcreate-step1") }}" method="POST" enctype="multipart/form-data">
      @csrf
 
       <div class="form-group">
        <label for="description">Entity Mode</label>
        <select class="form-control" name="ev_mode" id="uva">
         <option value="" disabled>--Please Select--</option>
         <option value="Online" {{ (isset($ivent->ev_mode) && $ivent->ev_mode == 'Online') ? "selected=\"selected\"" : "" }}>Online</option>
         <option value="Offline" {{ (isset($ivent->ev_mode) && $ivent->ev_mode == 'Offline') ? "selected=\"selected\"" : "" }}>Offline</option>
         <option value="Both" {{ (isset($ivent->ev_mode) && $ivent->ev_mode == 'Both') ? "selected=\"selected\"" : "" }}>Both</option>

       </select>
       
     </div>
     <div id="uvaon" style="display: none;">
      <div class="form-group">
       <label>Event Name:</label>
       <input type="text" class="form-control" id="ename" name="ev_title" value="{{$ivent->ev_title  ?? ''}}"> 
     </div>

     <div class="form-group">
      <label for="description"> Event Duration</label>
      <select class="form-control" name="ev_dura" id="uvaevent">
       <option value="" disabled>--Please Select--</option>
        <option value="Single Day" {{ (isset($ivent->ev_dura) && $ivent->ev_dura == 'Single Day') ? "selected=\"selected\"" : "" }}>Single Day</option>
        <option value="Multi Day" {{ (isset($ivent->ev_dura) && $ivent->ev_dura == 'Multi Day') ? "selected=\"selected\"" : "" }}>Multi Day</option>

      </select>

    </div>
    <div class="row" id="uvatime" style="display: none;">
      <div class ="col-sm-6">
      	<div class="form-group">
          <label for="description"> Start Date</label>
          <input type="text" id="date" name="ev_start" placeholder="yyyy-mm-dd" class="form-control date" value="{{ old('ev_start', isset($ivent) ? $ivent->ev_start : '') }}" required>
        </div>
      </div>
      <div class ="col-sm-6" id="uvat2">
        <div class="form-group">
          <label for="description"> End Date</label>
          <input type="text" id="date" name="ev_end" placeholder="yyyy-mm-dd" class="form-control date" value="{{ old('ev_end', isset($ivent) ? $ivent->ev_end : '') }}">
        </div>
      </div>
    </div>

<div class="row">
  <div class ="col-sm-6">
    <div class="form-group">
      <label>From Time</label>
      <input type="time" name="ev_time" class="form-control time" value="{{ old('ev_time', isset($ivent) ? $ivent->ev_time : '') }}" required >
    </div>
  </div>
  <div class ="col-sm-6">
       <div class="form-group">
      <label>To Time</label>
      <input type="time" name="ev_endtime" class="form-control time" value="{{ old('ev_endtime', isset($ivent) ? $ivent->ev_endtime : '') }}" required >
    </div>
</div>
</div>

    <div id="uvaol">

     <div class="form-group">
      <label>Event City</label>
      <input type="text" class="form-control" id="ecity" name="ev_city" value="{{$ivent->ev_city ?? ''}}">
    </div>
    <div class="form-group">
      <label>Event Location</label>
      <input type="text" class="form-control" id="evenue" name="ev_venue" value="{{$ivent->ev_venue ?? ''}}">
    </div>
  </div>
  <div id="uvaonlin">
   <div class="form-group">
    <label>Event Link</label>
    <input type="text" class="form-control" id="elink" name="ev_link" value="{{$ivent->ev_link ?? ''}}">
  </div>
</div>

  <div class="form-group">
    <label>About Event</label>
    <textarea class="form-control" rows="3" id="no" name="ev_about">{{$ivent->ev_about ?? ''}}</textarea>
   
  </div>

</div>



<input type="hidden"  value="{{ $ivent->id ?? '' }}" class="form-control" id="ivent" name="ivent"/>
<input type="hidden"  value="1" class="form-control" id="step" name="ev_step"/>
<input type="hidden"  value="UNFINISHED" class="form-control" id="jstatus" name="ev_status"/>

<input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
<div>
  <input class="btn btn-danger" type="submit" value="{{ trans('Next') }}">
</div>
</form>
</div>
</div>
</div>
</div>




@endsection

@section('scripts')


<script>  
  $(document).ready(function(){
    $('#uva').on('change', function() {
      $("#uvaon").slideDown();
      if ( this.value == 'Offline')
      {
        $("#uvaol").slideDown();
        $("#uvaonlin").slideUp();
        
      }
      else if (this.value == 'Online')
      {
        $("#uvaonlin").slideDown();
        $("#uvaol").slideUp();
      }
     else 
     {
       $("#uvaol").slideDown();
       $("#uvaonlin").slideDown();

     }

    });
  });
</script>
<script> 

  $(document).ready(function () {
    $("#uva").each(function () {
    	

      var sac = $(this).val($(this).find('option[selected]').val());



      if ( sac.val() == 'Offline')

      {
        $("#uvaon").slideDown();
        $("#uvaol").slideDown();
        $("#uvaonlin").slideUp();
        
      }
      else if(sac.val() == 'Online')
      {
        $("#uvaon").slideDown();
        $("#uvaonlin").slideDown();
        $("#uvaol").slideUp();
      }

   else if(sac.val() == 'Both')
      {
        $("#uvaon").slideDown();
        $("#uvaol").slideDown();
       
        $("#uvaonlin").slideDown();
        
      }


    });
  })
</script>


<script>  
  $(document).ready(function(){
    $('#uvaevent').on('change', function() {

    	$("#uvatime").slideDown();
      if ( this.value == 'Multi Day')
      {
        $("#uvat2").slideDown();

        
      }
      else
      {

        $("#uvat2").slideUp();
      }
    });
  });
</script>


<script>
  $(document).ready(function () {
    $("#uvaevent").each(function () {
 

      var sac2 = $(this).val($(this).find('option[selected]').val());

     

       if(sac2.val() == 'Multi Day')

       {
            $("#uvatime").slideDown();

        $("#uvat2").slideDown();
      }
      else if(sac2.val() == 'Single Day')
      {
            $("#uvatime").slideDown();

       $("#uvat2").slideUp();
     }



 });
  })
</script>




<script type="text/javascript">



  $(document).ready(function(){

    $( "#ecity" ).autocomplete({
      source: function( request, response ) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          // Fetch data
          $.ajax({
            url:"{{route('admin.events.fetchcity')}}",
            type: 'post',
            dataType: "json",
            data: {

             search: request.term
           },
           success: function( data ) {
             response( data );

           }
         });
        },
        select: function (event, ui) {

      
          
          $('#ecity').val(ui.item.label); 

          


          return false;
        }
      });

  });

</script>




@endsection

