@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('News') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.news.update", [$news->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


                    <div class="form-group {{ $errors->has('news_cat') ? 'has-error' : '' }}">
                <label for="news_cat">{{ trans('Category') }}</label>
                <select name="news_cat" id="news_cat" class="form-control select2" required>
                    @foreach($dycats as $id => $dycat)
                        <option value="{{ $dycat}}" {{ (isset($news) ? $news->news_cat : old('news_cat')) == $dycat ? 'selected' : '' }}>{{ $dycat }}</option>
                    @endforeach
                </select>
                @if($errors->has('news_cat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('news_cat') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.incomeCategory.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('nstitle', isset($news) ? $news->nstitle : '') }}" required>
             
            </div>
             <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Details') }}*</label>
                <input type="textbox"  name="nsdetail" class="form-control" value="{{ old('nsdetail', isset($news) ? $news->nsdetail : '') }}" required>
               
             
            </div>
               <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Links') }}</label>
                <input type="text"  name="nslink" class="form-control" value="{{ old('nslink', isset($news) ? $news->nslink : '') }}">
               
             
            </div>
             <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Any Pic') }}</label>
               <input type="file" name="nspic" required placeholder="Choose image" id="image" value="{{ old('nspic', isset($news) ? $news->nspic : '') }}">
                           
                        <img id="image_preview_container"   src="{{ URL::asset("/public/image/news/".$news->nspic) }}"
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">
               
             
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
 @endsection