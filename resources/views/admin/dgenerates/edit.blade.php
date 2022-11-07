@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('Services') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.coviddatas.update", [$coviddata->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          
            <div class="form-group">
                <label for="description">{{ trans('Category Name') }}</label>
                <input type="text" id="description" name="covid_name" class="form-control" value="{{ old('covid_name', isset($coviddata) ? $coviddata->covid_name : '') }}">
           
            </div>

    <div class="form-group">
     <label>Please Upload logo:</label>
     <input type="file" name="covid_logo" placeholder="Choose image" id="image" aria-describedby="fileHelp" value="{{ old('covid_logo', isset($coviddata) ? $coviddata->covid_logo : '') }}">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    
                           
                        <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                             @if(isset($coviddata->covid_logo))
 
   <img alt="event image" style="max-height: 150px; float: right; max-width: 150px;" src="{{ URL::asset("/public/image/uvacovid/".$coviddata->covid_logo ?? '') }}"/>
          @endif
    
</div>

             <div class="form-group"> 
                    <label>Enter Services:</label>
                 <textarea name="covid_data" placeholder="Details like services Mobile, Time Of Opening ,Stock Avilavbility"  class="ustyle" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')"> {{ old('covid_data', isset($coviddata) ? $coviddata->covid_data : '') }} </textarea>
</div>
    <div class="form-group"> 
        <label> Location:</label>
                 <textarea name="covid_location" placeholder="Provide Your Address" class="ustyle" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">{{ old('covid_location', isset($coviddata) ? $coviddata->covid_location : '') }} </textarea>
</div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


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

 <style>
    textarea{
    width: 600px;
    height: 120px;
    border: 3px solid #cccccc;
    padding: 5px;
    background-image: url(bg.gif);
    background-position: bottom right;
    background-repeat: no-repeat;
}
 </style>
<script>
    function setbg(color)
{
 $('.ustyle').style.background=color;
}
</script>

 @endsection