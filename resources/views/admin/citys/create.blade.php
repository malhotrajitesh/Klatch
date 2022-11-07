@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('City') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.citys.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
         <div class="row">
            <div class="col-md-8">
            <div class="form-group {{ $errors->has('city_name') ? 'has-error' : '' }}">
                <label for="description">{{ trans('City Name') }}</label>
              <input type="text" id="uvapa" class="form-control" name="city_name" class="form-control" value="" required> </textarea>
            </div></div>
        
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

 @endsection