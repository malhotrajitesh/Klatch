@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('Page') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.pages.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
         <div class="row">
            <div class="col-md-8">
            <div class="form-group {{ $errors->has('page_title') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Page Title') }}</label>
               <textarea class="ckeditor form-control" name="page_title" class="form-control" value="" required> </textarea>
            </div></div>
            <div class="col-md-4">

            <div class="form-group {{ $errors->has('page_type') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Page Type') }}</label>
                <input type="text" id="uvapa" name="page_type" class="form-control" value="" required>
            </div> </div></div>

 <div class="form-group">
     <label>Page Data:</label>
     <textarea class="ckeditor form-control" name="page_data"></textarea>
                        </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
 @endsection