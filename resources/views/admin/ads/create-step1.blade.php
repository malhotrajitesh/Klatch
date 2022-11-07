@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('Ad') }} {{ trans('Category') }}  {{ trans('Step 1') }}
    </div>
                    
                         <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$ad->adprog ?? ''}}%">
   {{$ad->adprog ?? ''}}%
  </div>
</div> 

    <div class="card-body">
    <form action="{{ route('admin.ads.create-step1') }}" method="post">
      @csrf
      <div class="form-group {{ $errors->has('ad_cat_id') ? 'has-error' : '' }}">
                <label for="adscat_category">{{ trans('Category') }}</label>
                <select name="ad_cat_id" id="adscat_category" class="form-control select2">
                    @foreach($adscat_categories as $id => $adscat_category)
                        <option value="{{ $id }}" {{ (isset($ad) && $ad->ad_cats ? $ad->ad_cats->id : old('ad_cat_id')) == $id ? 'selected' : '' }}>{{ $adscat_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('ad_cat_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ad_cat_id') }}
                    </em>
                @endif
            </div>
   
     
     <div class="form-group {{ $errors->has('salesman_id') ? 'has-error' : '' }}">
                <label for="Sub Category">{{ trans('Sub category') }}</label> 
    <select name="ad_scat_id" id="sub_id" required class="form-control input-lg" title="Sub Category">
  
         <option value="{{$ad->ad_scat_id ?? ''}}" {{ (isset($ad->ad_scat_id) && $ad->ad_scat_id == $ad->ad_scat_id) ? "selected=\"selected\"" : "" }}>{{ $ad->ad_scats->name ?? '' }}</option>

</select>
</div>
<input type="hidden"  value="{{ $ad->id ?? '' }}" class="form-control" id="nid" name="nid"/>
  <input type="hidden"  value="1" class="form-control" id="step" name="step"/>
           <input type="hidden"  value="UNFINISHED" class="form-control" id="status" name="ad_status"/>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
          &nbsp;
        <button type="submit" class="btn btn-primary">Next </button>
      </div>
    </form>
</div>
</div>

@endsection
 @section('scripts')
            <script>


 $('#adscat_category').change(function(){
  var id = $('#adscat_category').val();

 
  

  if(id != '')
  {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
    

     
    url:"{{ route('admin.ads.fetch') }}",
    method:"POST",
     
     
    data:{id:id},
    success:function(data)
    {
       
     
     $('#sub_id').html(data);
    
    }
   });
  }
  else
  {
   $('#sub_id').html('<option value="">No Record </option>');
  
  }
 });




</script>
@endsection