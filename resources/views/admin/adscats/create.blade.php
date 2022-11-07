@extends('layouts.admin')
@section('content')
@include('partials._alert')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('Sub Category') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.adscats.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('ad_cat_id') ? 'has-error' : '' }}">
                <label for="adscat_category">{{ trans('Category') }}</label>
                <select name="ad_cat_id" id="adscat_category" class="form-control select2" required>
                    @foreach($adscat_categories as $id => $adscat_category)
                        <option value="{{ $id }}" {{ (isset($adscat) && $adscat->adscat_category ? $adscat->adscat_category->id : old('ad_cat_id')) == $id ? 'selected' : '' }}>{{ $adscat_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('ad_cat_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ad_cat_id') }}
                    </em>
                @endif
            </div>
         
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="description">{{ trans('Name') }}</label>
                <input type="text" id="name" name="name" required class="form-control" value="{{ old('name', isset($adscat) ? $adscat->name : '') }}">
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

@section('scripts')
<script type="text/javascript">

    
   
    $(document).ready(function(){

      $( "#name" ).autocomplete({
        source: function( request, response ) {
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
          // Fetch data
          $.ajax({
            url:"{{route('admin.adscats.scname')}}",
            type: 'post',
            dataType: "json",
            data: {
              
               search: request.term
            },
            success: function( data ) {
               response( data );

            }
          });
        },
        select: function (event, ui) {
            
          
          
           $('#name').val(ui.item.label); 
      

      return false;
        }
      });

    });

    </script>
    @endsection