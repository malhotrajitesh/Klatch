@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('Ad') }} {{ trans(' Preview') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.ads.update", [$ad->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
               
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
                 <td>Ad Pin code:</td>
                <td><strong>{{$ad->ad_pincode}}</strong></td>
            </tr>
            <tr>
                <td>ad Image:</td>
                <td>                  <div class="photo">
                                    <div id="blogCarousel{{ $ad->id ?? ''}}1" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel{{ $ad->id ?? ''}}1" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel{{ $ad->id ?? ''}}1" data-slide-to="1"></li>
                            <li data-target="#blogCarousel{{ $ad->id ?? ''}}1" data-slide-to="2"></li>
                            <li data-target="#blogCarousel{{ $ad->id ?? ''}}1" data-slide-to="3"></li>
                            <li data-target="#blogCarousel{{ $ad->id ?? ''}}1" data-slide-to="4"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$ad->ad_pic ?? '') }}">  
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$ad->ad_picb ?? '') }}">  
                               
                            </div>
                              <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$ad->ad_picc ?? '') }}">  
                               
                            </div>
                              <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$ad->ad_picd ?? '') }}">  
                               
                            </div>
                              <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$ad->ad_pice ?? '') }}">  
                               
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                </div></td>
                
            </tr>
             <tr>
                 <td>Created At:</td>
                <td><strong>{{$ad->created_at->diffForHumans() }}</strong>  at date  {{$ad->created_at ?? ''}}</td>
            </tr>
            
        </table>
           <div class="form-group">
                <label for="due_date">{{ trans('Expire Days') }}*</label>
                <input type="text" id="exp_date" name="exp_date" class="form-control" placeholder="Days" value="15" required>
         
              
            </div>
             <div class="form-group">
            <label for="description">Perimssion</label>
            <select class="form-control" name="ad_status" required>
                <option value="Approve">Approve</option>
                <option  value="Reject"> Reject</option>
            </select>
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
.carousel-indicators {
  left: 0;
  top: auto;
    bottom: -50px;

}

/* The colour of the indicators   carousel css*/
.carousel-indicators li {
    background-color: red !important;
    
   
   
    margin-bottom: 12px !important;
}

.carousel-indicators .active {
background:  #0EDB60;
}

.carousel-inner
{
  width:auto !important;
  height:300px !important;
  position:relative;

}
    .carousel-item{
 
  position:relative;

   border: 5px solid blue;
    border-radius: 5px;
    background: #FFF;
}
.carousel-item:hover img {
            transform: scale(1.5);
        }
.carousel-item img{
  width:auto;
  height:280px;
  object-fit:cover;
}



  </style>