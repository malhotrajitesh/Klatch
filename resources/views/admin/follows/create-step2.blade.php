@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-hefollower">
       {{ trans('follow  Details') }} {{ trans('Step 2') }}
    </div>

    <div class="card-body">
    <form action="{{ route('admin.follows.postCreateStep2') }}" method="post" enctype="multipart/form-data">
      @csrf

<div class="row">
	<div class="col-md-6">
      <div class="form-group">
   <span class="btn btn-primary btn-file">
    Upload Video Or Image
     <input type="file" name="so_imga" class="itrick" placeholder="Choose image" data-mycheckbox="1" id="image1" aria-describedby="fileHelp" value="{{ old('so_imga', isset($follow) ? $follow->so_imga : '') }}"></span>
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
              <video width="320" height="240" id="jonh" style="display: none;"  controls>
      <source id="video_preview_container1"  src="" type="video/mp4">
    Your browser does not support the video tag.
</video>
                           
                        <img id="image_preview_container1"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($follow->so_imga))
                           @if(pathinfo($follow->so_imga, PATHINFO_EXTENSION) == 'mp4')
                                        <video width="320" height="240"   controls>
      <source   src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imga ?? '') }}">
    Your browser does not support the video tag.
</video>
@else
<img alt="follow image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imga ?? '') }}"/>
    
        @endif
        @endif
                            
    
</div>

    
 
</div>
<div class="col-md-6">
   <div class="form-group">
     <label>Please Upload an Image for follow:</label>
     <input type="file" name="so_imgb" class="itrick" placeholder="Choose image" data-mycheckbox="2" id="image2" aria-describedby="fileHelp" value="{{ old('so_imgb', isset($follow) ? $follow->so_imgb : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container2"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($follow->so_imgb))
 
   <img alt="follow image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imgb ?? '') }}"/>
          @endif
    
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
   <div class="form-group">
     <label>Please Upload an Image for follow:</label>
     <input type="file" name="so_imgc" class="itrick" placeholder="Choose image" data-mycheckbox="3" id="image3" aria-describedby="fileHelp" value="{{ old('so_imgc', isset($follow) ? $follow->so_imgc : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container3"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($follow->so_imgc))
 
   <img alt="follow image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imgc ?? '') }}"/>
          @endif
    
</div>
</div>
<div class="col-md-6">
   <div class="form-group">
     <label>Please Upload an Image for follow:</label>
     <input type="file" name="so_imgd" class="itrick" placeholder="Choose image" data-mycheckbox="4" id="image4" aria-describedby="fileHelp" value="{{ old('so_imgd', isset($follow) ? $follow->so_imgd : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container4"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($follow->so_imgd))
 
   <img alt="follow image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imgd ?? '') }}"/>
          @endif
    
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">

   <div class="form-group">
     <label>Please Upload an Image for follow:</label>
     <input type="file" name="so_imge" class="itrick" placeholder="Choose image" data-mycheckbox="5" id="image5" aria-describedby="fileHelp" value="{{ old('so_imgae', isset($follow) ? $follow->so_imge : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container5"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($follow->so_imge))
 
   <img alt="follow image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imge ?? '') }}"/>
          @endif
    
</div>
</div>
</div>
<br>




        <input type="hidden"  value="{{ $follow->id ?? '' }}" class="form-control" id="nid" name="follow_id"/>
          <input type="hidden"  value="2" class="form-control" id="step" name="so_step"/>
           <input type="hidden"  value="UNFINISHED" class="form-control" id="status" name="so_status"/>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         <br>
        <button type="submit" style="float: right;" class="btn btn-primary"> Next</button>
    </form>
    @php
     $follow = $follow->id ?? '' ;
    @endphp
     <a style="margin-top:20px;" class="btn btn-danger" href="{{route('admin.follows.create-step1',compact('follow'))}}">
                {{ trans('Previous') }}
            </a>
</div>
</div>

@endsection
@section('scripts')

<style>
  .btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}

</style>

  
<script>
  
 $('.itrick').change(function(){
   var i = $(this).data('mycheckbox');
  
  

   var fname = $("#image"+i).val();
  
    var fex = fname.replace(/^.*\./, '');

if(fex=='mp4')
{
	$('#image_preview_container'+i).hide();
$('#jonh').show();
  var $source = $('#video_preview_container1');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();

}
else{
	$('#jonh').hide();
   $('#image_preview_container'+i).show();

  
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container'+i).attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 

}
});


</script>



  
 @endsection