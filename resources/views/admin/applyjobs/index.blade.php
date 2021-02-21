@extends('layouts.admin')
@section('content')
 @include('partials._user_job')
  

  @if(count($errors)>0)
  <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
    <ul>
      @foreach($errors->all() as $error)
        <li style="list-style: none;">{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
       
  @include('partials._alert') 

<div class="card">
    <div class="card-header">
        {{ trans('All') }} {{ trans('Jobs') }}
    </div>
  <div class="card-body col-lg-9">
                      @if(count($applyjobs) > 0)
                        @foreach ($applyjobs as $applyjob)
                        <div class="card mb-3">
                          <h5 class="h5 card-header">
                          <div class="row">
                            <div class="col">
                            <a href="{{route('admin.applyjobs.show',$applyjob->id)}}" class="text-info">{{ ucwords($applyjob->job_t ?? '')}}</a>   </div> <div class="col"><a class="triggern" href="#"  data-mycheckbox="{{$applyjob->id}}">
  
   @if($applyjob->savejobs() == 0)
    <i id="gwn{{$applyjob->id}}"  style="color: green; padding-left: 50%; padding-right: 50%" class="fa fa-heart"></i>
@else
<i id="gwn{{$applyjob->id}}"  style="color: red; padding-left: 50%; padding-right: 50%" class="fa fa-heart"></i>
@endif
      </a> </div>
    <div class="col">
     
     @if($applyjob->applys() == 0)<a  class="btn plink" style="float: right;" id="{{$applyjob->id}}" href="{{ route("admin.profiles.index") }}">Apply</a> @else <a  class="text-info" href="#" style="float: right;"> Applied </a> @endif </div></div></h5>
                           
                            <div class="card-block px-3"> 
                                @if(isset($applyjob->cmp_id))

                               <img class="p-0 logo rounded-circle" style="width:128px; height: 128px; float: right; " src="{{ URL::asset("/public/image/clogo/".$applyjob->company->logo ?? '') }}">   </img> @endif                     
                              <p class="small">
                                <span>Budget: {{$applyjob->jminsal ?? ''}} - {{$applyjob->jmaxsal ?? ''}}</span>
                                <span> - </span>

                                <span>Posted: {{$applyjob->created_at->diffForHumans()}}</span>
                              </p>
                              <p class="small">
                                <span><span class="text-success"><i class="fas fa-briefcase"></i> Skills:</span> @foreach($applyjob->skills as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach</span> 
                                <br>
                                <span><span class="text-success"><i class="fas fa-hourglass-end"></i> Qualification:</span> @foreach($applyjob->degrees as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach</span>
            
                                <br>

                                <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span> {{$applyjob->job_cats->name  ?? ''}}</span>
                              </p>
                              <span style="color: blue;">
                              <div class="row">
                                <div class="col"> 
                              {{$applyjob->jseeker  ?? ''}} Applicant </div> <div class="col"> 
                              <i  style="padding-left: 50%; color: blue; padding-right: 50%;" class="fas fa-eye" style="display: inline;">&nbsp;{{$applyjob->jview  ?? ''}}</i> </div></div></span>

                          </div>
                        </div>      
                        @endforeach
                       
                    @else 
                      <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
                    @endif
                  </div>
   
</div>
@endsection
@section('scripts')
@parent
<script>
$("a.plink").click(function (event) {
	event.preventDefault();

        url1 = event.target.href;
        var jid = $(this).attr('id');

  //alert(jid);

//alert(url);
 

 
  

  if(jid != '')
  {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
    

     
    url:"{{ route('admin.applyjobs.japply') }}",
    method:"POST",
     
     dataType: 'json',
    data:{jid:jid},
    success:function(data)

    {
    	//alert(data);
     if(data=='first')
     {
       var tk = "Are you wanted check profile for this job?";
      if (confirm(tk)) {
   window.open(url1, 'newwin');
} else {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
    

     
    url:"{{ route('admin.applyjobs.joapply') }}",
    method:"POST",
     
     dataType: 'json',
    data:{jid:jid},
    success:function(data)
    {
    	alert("Job Applied Successfully");
    	location.reload();
    	}
    	 });
}
     
     }
     else
     {
alert("Job Applied Successfully");
    	location.reload();
     }

  //  alert(data);
    }
   });
  }
  else
  {
   alert("Stay Alert ");
  
  }
});


</script>

<script>
 $(".triggern").click(function(event) {
    var identifier = $(this).data('mycheckbox');
    var input_identifier = "#gw" + identifier; 
     

  if(identifier != '')
  {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
    

     
    url:"{{ route('admin.applyjobs.jobsave') }}",
    method:"POST",
     
     dataType: 'json',
    data:{job:identifier},
    success:function(data)
    {
   

    if (data == 1) {
location.reload();
    alert("Job Saved Successfully");
      
    
   } else {
    location.reload();
     alert("Job Removed Successfully");
      
    
   }
    }
   });
  }
  else
  {
   alert("Stay Alert ");
  
  }
});




</script>

@endsection