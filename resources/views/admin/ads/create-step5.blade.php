@extends('layouts.admin')
@section('content')
    <h1>Final - Step</h1>
    <hr>
    <h3>Review Ad Details</h3>
     

     
  
                 
                         <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$ad->adprog ?? ''}}%">
   {{$ad->adprog ?? ''}}%
  </div>
</div> 
    <form action="{{ route("admin.ads.store") }}" method="post" >
          @csrf
        <table class="table">
             <tr>
                <td>category:</td>
                <td><strong>{{$ad->ad_cats->name ?? ''}}</strong></td>
            </tr>
             <tr>
                <td>Sub Category:</td>
                <td><strong>{{$ad->ad_scats->name ?? ''}}</strong></td>
            </tr>
            <tr>
                <td>Ad Title:</td>
                <td><strong>{{$ad->adti}}</strong></td>
            </tr>
            <tr>
                <td>Ad Description:</td>
                <td><strong>{{$ad->adtd}}</strong></td>
               
            </tr>
                <tr>
                <td>Quantity:</td>
                <td><strong>{{$ad->qty ?? ''}}</strong></td>
               
            </tr>
              <tr>
                <td>Ad Price:</td>
                <td><strong>{{$ad->ad_price ?? ''}}</strong></td>
               
            </tr>
            <tr>
                <td>Ad Type:</td>
                <td><strong>{{$ad->ad_type}}</strong></td>
            </tr>
            <tr>
                <td>Ad City:</td>
                <td><strong>{{$ad->ad_city }}</strong></td>
            </tr>
                <tr>
                <td>Ad Area:</td>
                <td><strong>{{$ad->ad_area }}</strong></td>
            </tr>

              <tr>
                <td>Ad State:</td>
                <td><strong>{{$ad->ad_state }}</strong></td>
            </tr>

   <tr>
                <td>Ad Address:</td>
                <td><strong>{{$ad->ad_address }}</strong></td>
            </tr>
            <tr>
                 <td>Ad Pin code:</td>
                <td><strong>{{$ad->ad_pincode}}</strong></td>
            </tr>
         
        </table>
   &nbsp;

        <div id="uva">
  <div class="container">
    <div id="carousel">
      <figure><img  style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_pic ?? '') }}" alt=""></figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_picb ?? '') }}" alt=""></figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_picc ?? '') }}" alt=""></figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_picd ?? '') }}" alt=""></figure>
      <figure><img style="max-height: 100%;  min-width: 100%;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_pice ?? '') }}" alt=""></figure>
     
    </div>
  </div>
</div>

          <input type="hidden"  value="5" class="form-control" id="step" name="step"/>
           <input type="hidden"  value="{{$ad->id  ?? ''}}" class="form-control" id="step" name="nid"/>
           <input type="hidden"  value="Pending" class="form-control" id="status" name="ad_status"/>
     
        <button type="submit" class="btn btn-primary">Create Ad</button>

    </form>

     <a style="margin-top:20px;" type="button" href="{{route('admin.ads.create-step4',$ad=$ad->id)}}" class="btn btn-warning">Previous</a>
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

@endsection