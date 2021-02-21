@extends('layouts.admin')
@section('content')

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
                    <label class="control-label">&nbsp;</label><br>
                    <button class="btn btn-primary" type="submit">{{ trans('Filter') }}</button>
                </div>
            
              </div>
</form>
     <div class="row">

     
                    @foreach($ads as $key => $ad)

                   
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img  src="{{ URL::asset("/public/image/".$ad->ad_pic ?? '') }}" class="img-responsive" />
                                      <div class="image-label">
                                        <a class="trigger" href="#"  data-mycheckbox="{{ $ad->id ?? '' }}">
  
   
    <i id="gw{{ $ad->id ?? '' }}"  style="color: green;" class="fa fa-heart"></i> </a>
    
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
                                            <i class="fa fa-eye" style="color: #FF5252;">{{ $ad->aview ?? '' }}</i><a class="btn btn-xs btn-primary" href="{{ route('admin.ads.show', $ad->id) }}" class="hidden-sm">View</a></p>
                              
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