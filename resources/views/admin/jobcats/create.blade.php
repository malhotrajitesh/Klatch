@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('Category') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jobcats.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($jobcat) ? $jobcat->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
             
            </div>
              <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection