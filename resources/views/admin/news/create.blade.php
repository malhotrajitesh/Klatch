@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('News') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.news.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
              
                    <div class="form-group {{ $errors->has('news_cat') ? 'has-error' : '' }}">
                <label for="news_cat">{{ trans('Category') }}</label>
                <select name="news_cat" id="news_cat" class="form-control select2" required>
                    @foreach($dycats as $id => $dycat)
                        <option value="{{ $dycat}}">{{ $dycat }}</option>
                    @endforeach
                </select>
                @if($errors->has('news_cat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('news_cat') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Name') }}*</label>
                <input type="text" id="name" name="nstitle" class="form-control" value="" required>
               
             
            </div>
               <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Details') }}*</label>
                <input type="textbox"  name="nsdetail" class="form-control" value="" required>
               
             
            </div>
               <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Links') }}</label>
                <input type="text"  name="nslink" class="form-control" value="">
               
             
            </div>
             <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Any Pic') }}</label>
               <input type="file" name="nspic" required placeholder="Choose image" id="image" value="">
                           
                        <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">
               
             
            </div>
              <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
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
 @endsection