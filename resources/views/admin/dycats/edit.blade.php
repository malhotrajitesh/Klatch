@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('category') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.dycats.update", [$dycat->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          
        
    <div class="row">
            <div class="col-md-8">
     <div class="form-group {{ $errors->has('dycat_title') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Category Name') }}</label>
                <input type="text"  name="cat_name" class="form-control" value="{{ old('cat_name', isset($dycat) ? $dycat->cat_name : '') }}" required>
            </div></div>

         <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
                       

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
