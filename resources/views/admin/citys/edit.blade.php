@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('city') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.citys.update", [$city->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          
        
    <div class="row">
            <div class="col-md-8">
     <div class="form-group {{ $errors->has('city_title') ? 'has-error' : '' }}">
                <label for="description">{{ trans('City Name') }}</label>
                <input type="text" id="uvapa" class="form-control" name="city_name" class="form-control" value="" required>{{ old('city_name', isset($city) ? $city->city_name : '') }} </textarea>
            </div></div>

  

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

 @endsection