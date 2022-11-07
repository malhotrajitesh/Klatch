@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('Report Question') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rsqs.update", [$rsq->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          
        
    <div class="row">
            <div class="col-md-8">
     <div class="form-group {{ $errors->has('rsq_title') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Question Type') }}</label>
                <input type="text" class="form-control" name="rsq_name" class="form-control" value="" required>{{ old('rsq_name', isset($rsq) ? $rsq->rsq_name : '') }} </textarea>
            </div></div>
 <div class="form-group">
    <select class="form-control" name="rsq_type">
       <option value="" disabled>--Please Select--</option>
        <option value="ad" {{ (isset($rsq->rsq_type) && $rsq->rsq_type == 'ad') ? "selected=\"selected\"" : "" }}>Ad</option>
        <option value="job" {{ (isset($rsq->rsq_type) && $rsq->rsq_type == 'job') ? "selected=\"selected\"" : "" }}>Job</option>
         <option value="event" {{ (isset($rsq->rsq_type) && $rsq->rsq_type == 'event') ? "selected=\"selected\"" : "" }}>Event</option>
        <option value="social" {{ (isset($rsq->rsq_type) && $rsq->rsq_type == 'social') ? "selected=\"selected\"" : "" }}>Social</option>

      </select>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

 @endsection