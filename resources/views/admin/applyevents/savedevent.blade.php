@extends('layouts.admin')
@section('content')

@include('partials._my_event')

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
 @include('partials._alert')
<div class="card">
    <div class="card-header">
        {{ trans('Saved') }} {{ trans('Events') }}
    </div>
   <div class="card-body">
<div class="row">
@if(count($applyevents) > 0)
                        @foreach ($applyevents as $applyevent)

<div class="col-md-4" >
                        <div class="item-box-blog">
                          <div class="item-box-blog-image">
                            <!--Date-->
                            <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">{{$applyevent->ev_time ?? '' }}</span> </div>
                            <div class="item-box-blog-heart bg-blue-ui white"> <span class="mon"> 
                             <a  href="javascript:void(0);" tabindex="0" class="uvatrick" data-mycheckbox="{{$applyevent->id}}">
                              @if($applyevent->saveevent() == 0)
                              <i id="gw"  style="color: white;" class="fa fa-heart"></i>
                              @else
                              <i id="gwmk"  style="color: red;" class="fa fa-heart"></i>
                              @endif
</a>
                            </span> </div>
                            <!--Image-->
                            <figure> <img alt="" src="{{URL::asset("/public/image/uvaevent/".$applyevent->ev_pic ?? '') }}"> </figure>
                          </div>
                          <div class="item-box-blog-body">
                            <!--Heading-->
                            <div class="item-box-blog-heading">
                              <a href="{{route('admin.applyevents.show',$applyevent->id)}}" tabindex="0">
                                <h5>{{$applyevent->ev_title ?? ''}}</h5>
                              </a>
                            </div>
                            <!--Data-->
                            <div class="item-box-blog-data" style="padding: px 15px;">
                              <p><i class="fa fa-user-o"></i> {{$applyevent->ev_mode  ?? ''}}, <i class="fa fa-comments-o"></i> {{$applyevent->ev_dura ?? ''}}</p>
                            </div>
                            <!--Text-->
                            <div class="item-box-blog-text">
                              <p>{{$applyevent->ev_start ?? ''}} {{$applyevent->ev_end ?? ''}} {{$applyevent->ev_city ?? ''}} {{$applyevent->ev_by ?? ''}}</p>
                            </div>
                            <div class="mt"> <a  href="javascript:void(0);" tabindex="0" class="btn bg-blue-ui white read triggern" data-mycheckbox="{{$applyevent->id}}">@if($applyevent->icounts() == 0)
                              <i class="fa fa-star" aria-hidden="true"></i>
Interested
@else
<i class="fa fa-star" style="color: yellow"; aria-hidden="true"></i>
Interested
@endif
</a>

 </div>
                            <!--Read More Button-->
                          </div>
                        </div>
                      </div>

       @endforeach
                       
                    @else 
                      <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
                    @endif
                  </div>
</div>
</div>


@endsection
@section('scripts')
@parent
<style>
.col-md-4{
    padding-bottom:30px;
}

.white {
  color: #fff !important;
}
.mt{float: left;margin-top: -20px;padding-top: 20px;}
.bg-blue-ui {
  background-color: #708198 !important;
}
figure img{width:300px; height:280px;}

#blogCarousel {
  padding-bottom: 100px;
}

.item-box-blog {
  border: 1px solid #dadada;
  text-align: center;
  z-index: 4;
  padding: 20px;
}

.item-box-blog-image {
  position: relative;
}

.item-box-blog-image figure img {
  width: 100%;
  
}

.item-box-blog-date {
  position: absolute;
  z-index: 5;
  padding: 4px 20px;
  top: -20px;
  right: 8px;
  background-color: #41cb52;
}

.item-box-blog-heart {
  position: absolute;
  z-index: 5;
  padding: 4px 20px;
  top: -20px;
  left: 8px;
  background-color: #41cb52;
}

.item-box-blog-date span {
  color: #fff;
  display: block;
  text-align: center;
  line-height: 1.2;
}

.item-box-blog-date span.mon {
  font-size: 18px;
}

.item-box-blog-date span.day {
  font-size: 16px;
}

.item-box-blog-body {
  padding: 10px;
}

.item-heading-blog a h5 {
  margin: 0;
  line-height: 1;
  text-decoration:none;
  transition: color 0.3s;
}

.item-box-blog-heading a {
    text-decoration: none;
}

.item-box-blog-data p {
  font-size: 13px;
}

.item-box-blog-data p i {
  font-size: 12px;
}

.item-box-blog-text {
  max-height: 100px;
  overflow: hidden;
}

.mt-10 {
  float: left;
  margin-top: -10px;
  padding-top: 10px;
}

.btn.bg-blue-ui.white.read {
  cursor: pointer;
  padding: 4px 20px;
  float: left;
  margin-top: 10px;
}

.btn.bg-blue-ui.white.read:hover {
  box-shadow: 0px 5px 15px inset #4d5f77;
}

  </style>


<script>
 $(".triggern").click(function(event) {
    var identifier = $(this).data('mycheckbox');
   // var input_identifier = "#gw" + identifier; 
     

  if(identifier != '')
  {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
    

     
    url:"{{ route('admin.applyevents.eintested') }}",
    method:"POST",
     
     dataType: 'json',
    data:{ivent:identifier},
    success:function(data)
    {
   

    if (data == 1) {
location.reload();
    alert("Event Interest Added Successfully");
      
    
   } else {
    location.reload();
     alert("Event Interest Removed Successfully");
      
    
   }
    }
   });
  }
  else
  {
   alert("Contact Developer ");
  
  }
});




</script>

<script>
 $(".uvatrick").click(function(event) {
    var identifier = $(this).data('mycheckbox');
   // var input_identifier = "#gw" + identifier; 
     

  if(identifier != '')
  {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
    

     
    url:"{{ route('admin.applyevents.evbook') }}",
    method:"POST",
     
     dataType: 'json',
    data:{ivent:identifier},
    success:function(data)
    {
   

    if (data == 1) {
location.reload();
    alert("Event  Saved Successfully");
      
    
   } else {
    location.reload();
     alert("Event  Removed Successfully");
      
    
   }
    }
   });
  }
  else
  {
   alert("Contact Developer ");
  
  }
});




</script>

@endsection