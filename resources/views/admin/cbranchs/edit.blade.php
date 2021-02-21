@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('Company Branch') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.cbranchs.update", [$cbranch->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
             
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($cbranch) ? $cbranch->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection