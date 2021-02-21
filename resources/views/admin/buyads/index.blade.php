@extends('layouts.admin')
@section('content')
@include('partials._user_ad')
 @include('partials._alert')
 <form action="{{ route('admin.buyads.index') }}">
 	 <div class="row">
 	<div class="col-sm-3 form-group">

            <label for="Type">Type</label>
            <select class="form-control" name="ad_type">
            	<option value="">Select Type</option>
                <option value="New">New</option>
                <option value="Refurbished">Refurbished</option>
                <option value="Used">Used</option>
              
            </select>
     
 	</div>
   
   <div class="col-sm-3 form-group">
                    <label class="control-label" for="m">{{ trans('Name') }}</label>
                    <input type="text"  class="form-control" name="adti" placeholder="Search">
                </div>
         
       
                   
                 
                  <div class="col-sm-3 form-group">
                    <label class="control-label" for="m">{{ trans(' Price') }}</label>
                    <input type="text"  class="form-control" name="ad_price[start]" placeholder="Min price" value="">
                </div>
                   <div class="col-sm-3 form-group">
                    <label class="control-label" for="m">{{ trans(' Price') }}</label>
                    <input type="text"  class="form-control" name="ad_price[end]" placeholder="Max price" value="">
                </div>
                <div class="col-sm-3 form-group">
                    <label class="control-label" for="m">{{ trans(' City') }}</label>
                    <input type="text"  class="form-control" name="ad_city" placeholder="City" value="">
                </div>
                     <div class="col-sm-3 form-group">
                    <label for="adscat_category">{{ trans('Category') }}</label>
                <select name="ad_cat_id" id="adscat_category" class="form-control select2">
                    @foreach($adscat_categories as $id => $adscat_category)
                        <option value="{{ $id }}">{{ $adscat_category }}</option>
                    @endforeach
                </select>
                </div>
                  <div class="col-sm-3 form-group">
                <label for="Sub Category">{{ trans('Sub category') }}</label> 
    <select name="ad_scat_id" id="sub_id"  class="form-control input-lg" title="First Select Category" placeholder="First Select Category">
  
   

</select>
</div>
  <div class="col-sm-1 form-group">
                    <label class="control-label">&nbsp;</label><br>
                    <button class="btn btn-primary" type="submit">{{ trans('Filter') }}</button>
                </div>

            
              </div>
</form>
<button class="btn btn-primary" id="topb">{{ trans('Top 5 Ad') }}</button>
 <div class="row" id="top" style="display:none;">

     <h2><span>Top 5 Ads</span></h2>
                    @foreach($tops as $key => $ad)

                   
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
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
                                      <div class="image-label">
                                        <a class="triggern" href="#"  data-mycheckbox="{{ $ad->id ?? '' }}">
   
    <i id="gwn{{ $ad->id ?? '' }}"  style="color: red;" class="fa fa-heart"></i> </a>
   
    
  </div>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5 style="color: #fd7e14;">
                                                {{ $ad->adti ?? '' }}</h5>
                                            <h5 class="price-text-color">
                                               Rs. {{$ad->ad_price ?? ''}}</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-map-marker">{{ $ad->ad_city ?? '' }}</i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fas fa-bookmark" style="color: #fd7e14;" title="Bookmark"></i>{{ $ad->asaved ?? '' }} 
                                            <i class="fa fa-shopping-cart" style="color: #03DAC6;" title="Quantity"></i>{{ $ad->qty ?? '' }}</p>
                                        <p class=" btn-details">
                                            <i class="fa fa-eye" style="color: #FF5252;">{{ $ad->aview ?? '' }}</i><a class="btn btn-xs btn-primary" href="{{ route('admin.buyads.show', $ad->id) }}" class="hidden-sm">View</a></p>
                              
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>



                    @endforeach
           
      </div>
<br>
     <div class="row">

     <h2><span>All Ads</span></h2>
                    @foreach($buy_ads as $key => $buy_ad)

                   
                        <div class="col-sm-3">
                            <div class="col-item">
                             
                                <div class="photo">
                                   <div id="blogCarousel{{ $buy_ad->id ?? ''}}" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel{{ $buy_ad->id ?? ''}}" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel{{ $buy_ad->id ?? ''}}" data-slide-to="1"></li>
                            <li data-target="#blogCarousel{{ $buy_ad->id ?? ''}}" data-slide-to="2"></li>
                            <li data-target="#blogCarousel{{ $buy_ad->id ?? ''}}" data-slide-to="3"></li>
                            <li data-target="#blogCarousel{{ $buy_ad->id ?? ''}}" data-slide-to="4"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$buy_ad->ad_pic ?? '') }}">  
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$buy_ad->ad_picb ?? '') }}">  
                               
                            </div>
                              <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$buy_ad->ad_picc ?? '') }}">  
                               
                            </div>
                              <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$buy_ad->ad_picd ?? '') }}">  
                               
                            </div>
                              <div class="carousel-item">
                               <img alt="" class="img-responsive" src="{{URL::asset("/public/image/uvaad/".$buy_ad->ad_pice ?? '') }}">  
                               
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                                   
                                      <div class="image-label">
                                        <a class="trigger" href="#"  data-mycheckbox="{{ $buy_ad->id ?? '' }}">
  @if($buy_ad->savead() == 0)
  <i id="gw{{ $buy_ad->id ?? '' }}"  style="color: green;" class="fa fa-heart"></i>
   
    
    @else
    <i id="g"  style="color: red;" class="fa fa-heart"></i> 

    @endif


  </a>
    
  </div>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5 style="color: #fd7e14;">
                                                {{ $buy_ad->adti ?? '' }}</h5>
                                            <h5 class="price-text-color">
                                               Rs. {{$buy_ad->ad_price ?? ''}}</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-map-marker">{{ $buy_ad->ad_city ?? '' }}</i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fas fa-bookmark" style="color: #fd7e14;" title="Bookmark"></i>{{ $buy_ad->asaved ?? '' }} 
                                            <i class="fa fa-shopping-cart" style="color: #03DAC6;" title="Quantity"></i>{{ $buy_ad->qty ?? '' }}</p>
                                        <p class=" btn-details">
                                             @php
                  $aid=$buy_ad->id ?? '';
                  @endphp
                                            <i class="fa fa-eye" style="color: #FF5252;">{{ $buy_ad->aview ?? '' }}</i><a class="btn btn-xs btn-primary" href="{{ route('admin.buyads.adetail', compact('aid')) }}" class="hidden-sm">View</a></p>
                              
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
           
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
    background-color: #788277;
    
   
   
    margin-bottom: 12px;
}

.carousel-indicators .active {
background:  #0EDB60;
}

  </style>

<style>
h2 {
   width: 100%; 
   text-align: center; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 50px; 
} 

h2 span { 
    background:#fff; 
    padding:0 10px; 
}

.col-sm-3{
padding-bottom: 30px;

}
 
    .image-container{
  width:200px;
  height:200px;
  position:relative;
  margin:100px;
}
.image-container img{
  width:100%;
  height:100%;
  object-fit:cover;
}
.image-label{
  width:60px;
  height: 60px;
  display:flex;
  justify-content:center;
  align-items:center;
  border-radius:100%;
  background:skyblue;
  font-size:30px;
  position:absolute;
  top:0;
  right:0;
  transform:translate(50%,-50%);
}
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
   
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
    height: 200px;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}

.container { position: relative; }
.container img { display: block; }
.container .fa-heart { position: absolute; bottom:0; left:0; }

</style>
<script> 
 $('#topb').click(function(){
 $('#top').show();
  });


</script>

            <script>


 $('#adscat_category').change(function(){
  var id = $('#adscat_category').val();

 
  

  if(id != '')
  {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
    

     
    url:"{{ route('admin.ads.fetch') }}",
    method:"POST",
     
     
    data:{id:id},
    success:function(data)
    {
       
     
     $('#sub_id').html(data);
    
    }
   });
  }
  else
  {
   $('#sub_id').html('<option value="">No Record </option>');
  
  }
 });




</script>

<script>
 $(".trigger").click(function(event) {
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
    

     
    url:"{{ route('admin.adsaveds.adsave') }}",
    method:"POST",
     
     dataType: 'json',
    data:{ad:identifier},
    success:function(data)
    {
   

    if (data == 1) {

     $(input_identifier).css("color", "red");
    
   } else {
     $(input_identifier).css("color", "green");
    
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