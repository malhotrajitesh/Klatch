@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('Ad Category') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.adcats.update", [$adcat->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection