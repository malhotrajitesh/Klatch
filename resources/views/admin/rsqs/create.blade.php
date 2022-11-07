@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('Report Question') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rsqs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
         
         
            <div class="form-group {{ $errors->has('rsq_name') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Question Title') }}</label>
              <input type="text" id="uvapa" class="form-control" name="rsq_name" class="form-control" value="" required> </input>
            </div>
            
            <div class="form-group {{ $errors->has('rsq_type') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Question Type') }}</label>
            
  <select name="rsq_type" class="form-control select2">
    <option value="ad">AD</option>
    <option value="job">Job</option>
    <option value="event">Event</option>
    <option value="social">Socail</option>
  </select>
            </div>
        
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

 @endsection