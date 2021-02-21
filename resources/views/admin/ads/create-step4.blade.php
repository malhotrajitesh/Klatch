@extends('layouts.admin')
@section('content')


<div class="card">

    <div class="card-header">
        {{ trans('Ad Image') }} {{ trans('Step 4') }}
    </div>
                
                         <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$ad->adprog ?? ''}}%">
   {{$ad->adprog ?? ''}}%
  </div>
</div> 

    <div class="card-body">




        <form action="{{ route('admin.ads.postCreateStep4') }}" method="post" enctype="multipart/form-data">
        @csrf
          

         <h3>Upload Ad Images Min. 1 & Max.5</h3><br/><br/>
         <div class="row">
  <div class="col-md-6">
    
    <div class="form-group">
     <label>Please Upload an Image for ad:</label>
     <input type="hidden" name="testn" value="{{$ad->ad_pic ?? ''}}">
     <input type="file" name="ad_pic" class="atrick" placeholder="Choose image" data-mycheckbox="1" id="image1" aria-describedby="fileHelp" value="{{ old('ad_pic', isset($ad) ? $ad->ad_pic : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container1"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($ad->ad_pic))
 
   <img alt="ad image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_pic ?? '') }}"/>
          @endif
    
</div>
</div>
<div class="col-md-6">
   <div class="form-group">
     <label>Please Upload an Image for ad:</label>
     <input type="file" name="ad_picb" class="atrick" placeholder="Choose image" data-mycheckbox="2" id="image2" aria-describedby="fileHelp" value="{{ old('ad_picb', isset($ad) ? $ad->ad_picb : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container2"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($ad->ad_picb))
 
   <img alt="ad image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_picb ?? '') }}"/>
          @endif
    
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
   <div class="form-group">
     <label>Please Upload an Image for ad:</label>
     <input type="file" name="ad_picc" class="atrick" placeholder="Choose image" data-mycheckbox="3" id="image3" aria-describedby="fileHelp" value="{{ old('ad_picc', isset($ad) ? $ad->ad_picc : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container3"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($ad->ad_picc))
 
   <img alt="ad image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_picc ?? '') }}"/>
          @endif
    
</div>
</div>
<div class="col-md-6">
   <div class="form-group">
     <label>Please Upload an Image for ad:</label>
     <input type="file" name="ad_picd" class="atrick" placeholder="Choose image" data-mycheckbox="4" id="image4" aria-describedby="fileHelp" value="{{ old('ad_picd', isset($ad) ? $ad->ad_picd : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container4"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($ad->ad_picd))
 
   <img alt="ad image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_picd ?? '') }}"/>
          @endif
    
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">

   <div class="form-group">
     <label>Please Upload an Image for ad:</label>
     <input type="file" name="ad_pice" class="atrick" placeholder="Choose image" data-mycheckbox="5" id="image5" aria-describedby="fileHelp" value="{{ old('ad_pice', isset($ad) ? $ad->ad_pice : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container5"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($ad->ad_pice))
 
   <img alt="ad image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvaad/".$ad->ad_pice ?? '') }}"/>
          @endif
    
</div>
</div>
</div>
<br>
                          @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
     
        @endif
 <input type="hidden"  value="UNFINISHED" class="form-control" id="status" name="ad_status"/>
   
           <input type="hidden"  value="{{ $ad->id ?? '' }}" class="form-control" id="nid" name="nid"/>
            <input type="hidden"  value="4" class="form-control" id="step" name="step"/>
         
          
        <button type="submit" class="btn btn-primary">Next</button>
  
    </form><br/>
      <a style="margin-top:20px;" type="button" href="{{route('admin.ads.create-step3',$ad->id)}}" class="btn btn-warning">Previous</a>
</div>



</div>
</div>
</div>
@endsection
@section('scripts')
     <script>
    
  $('.atrick').change(function(){

     var i = $(this).data('mycheckbox');
    
     $('#image_preview_container'+i).show();

  
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container'+i).attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 

   });

  
 </script> 
@endsection