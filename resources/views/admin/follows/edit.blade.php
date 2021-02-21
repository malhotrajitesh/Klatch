@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      <h1>  {{ trans('Verify') }} {{ trans('Event') }} </h1>
    </div>

    <div class="card-body">
      
  <table class="table">
             <tr>
                <td>Title:</td>
                <td><strong>{{$follow->so_title  ?? ''}}</strong></td>
            </tr>
             <tr>
                <td>Description:</td>
                <td><strong>{{$follow->so_desc ?? ''}}</strong></td>
            </tr>
            <tr>
                <td>Tags</td>
                <td><strong>{{$follow->tag_names ?? ''}}</strong></td>
            </tr>
                
         
       
       
        
        </table>
        &nbsp;

        <div id="uva">
  <div class="container">
    <div id="carousel">
      <figure>
                                 @if(pathinfo($follow->so_imga, PATHINFO_EXTENSION) == 'mp4')
                                        <video style="max-height: 100%;  min-width: 100%;"   controls>
      <source   src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imga ?? '') }}">
    Your browser does not support the video tag.
</video>
@else
        <img  style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imga ?? '') }}" alt=""> @endif
      </figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imgb ?? '') }}" alt=""></figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imgc ?? '') }}" alt=""></figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imgd ?? '') }}" alt=""></figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imge ?? '') }}" alt=""></figure>
     
    </div>
  </div>
</div>
     
       <form action="{{ route("admin.follows.followverify", [$follow=$follow->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                <label for="due_date">{{ trans('Expire Days') }}*</label>
                <input type="text" id="exp_date" name="exp_date" class="form-control" placeholder=" Days" value="15" required>
         
              </div>
            </div>
             <div class="col-sm-4">
             <div class="form-group">
            <label for="description">Perimssion</label>
            <select class="form-control" name="so_status" required>
                <option value="Approve">Approve</option>
                <option  value="Reject"> Reject</option>
                <option  value="Reject"> Block</option>
            </select>
        </div>
     </div>

           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
@section('scripts')
<style>
  

*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  box-sizing: border-box;
}
*:before,
*:after{
  box-sizing: border-box;
}

#uva{
  background-image: radial-gradient(mintcream 25%, black 100%);
}
h1{
  display: table;
  margin: 5% auto 0;
  text-transform: uppercase;
  font-family: 'Anaheim', sans-serif;
  font-size: 4em;
  font-weight: 400;
  text-shadow: 0 1px white, 0 2px black;
}
.container{
  margin: 4% auto;
  width: 420px;
  height: 280px;
  position: relative;
  perspective: 1000px;
}
#carousel{
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  animation: rotation 20s infinite linear;
}
#carousel:hover{
  animation-play-state: paused;
}
#carousel figure{
  display: block;
  position: absolute;
  width: 248px;
  height: 155px;
  left: 10px;
  top: 10px;
  background: black;
  overflow: hidden;
  border: solid 5px black;
}
#carousel figure:nth-child(1){transform: rotateY(72deg) translateZ(288px);}
#carousel figure:nth-child(2) { transform: rotateY(144deg) translateZ(288px);}
#carousel figure:nth-child(3) { transform: rotateY(216deg) translateZ(288px);}
#carousel figure:nth-child(4) { transform: rotateY(288deg) translateZ(288px);}
#carousel figure:nth-child(5) { transform: rotateY(360deg) translateZ(288px);}


img{
  
  cursor: pointer;
  transition: all .5s ease;
}
img:hover{
  
  transform: scale(1.2,1.2);
}

@keyframes rotation{
  from{
    transform: rotateY(0deg);
  }
  to{
    transform: rotateY(360deg);
  }
}

</style>


<style>
table, th, td {
  
  border-bottom: 1px solid green;
}
table{
background-color: #1877f2;
color: white;
}
</style>

<style>
table, th, td {
  
  border-bottom: 1px solid green;


}
table{
background-color: #1877f2;
color: white;
outline: #4CAF50 solid 5px;
outline-style: double;
}
</style>
@endsection