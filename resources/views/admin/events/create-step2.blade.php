@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-heiventer">
       {{ trans('Event  Details') }} {{ trans('Step 2') }}
    </div>

    <div class="card-body">
    <form action="{{ route('admin.events.postCreateStep2') }}" method="post" enctype="multipart/form-data">
      @csrf


    
    <div class="form-group">
     <label>Please Upload an Image for Event:</label>
     <input type="file" name="ev_pic" placeholder="Choose image" id="image" aria-describedby="fileHelp" value="{{ old('ev_pic', isset($ivent) ? $ivent->ev_pic : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($ivent->ev_pic))
 
   <img alt="event image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvaevent/".$ivent->ev_pic ?? '') }}"/>
          @endif
    
</div>
<br>
<div class="form-group">
   <label>Organised By:</label>
  <input type="text" class="form-control" name="ev_by" placeholder="" value="{{ old('ev_by', isset($ivent) ? $ivent->ev_by : '') }}" required>
</div>




        <input type="hidden"  value="{{ $ivent->id ?? '' }}" class="form-control" id="nid" name="ivent_id"/>
          <input type="hidden"  value="2" class="form-control" id="step" name="ev_step"/>
           <input type="hidden"  value="UNFINISHED" class="form-control" id="status" name="ev_status"/>

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
     $ivent = $ivent->id ?? '' ;
    @endphp
     <a style="margin-top:20px;" class="btn btn-danger" href="{{route('admin.events.create-step1',compact('ivent'))}}">
                {{ trans('Previous') }}
            </a>
</div>
</div>

@endsection
@section('scripts')

     <script>
  $('#image').change(function(){
     $('#image_preview_container').show();

  
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 

   });
 </script> 
 @endsection