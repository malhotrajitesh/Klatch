@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       {{ trans('Ad  Price') }} {{ trans('Step 3') }}
    </div>
                    
                         <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$ad->adprog ?? ''}}%">
   {{$ad->adprog ?? ''}}%
  </div>
</div> 

    <div class="card-body">
    <form action="{{ route('admin.ads.postCreateStep3') }}" method="post">
      @csrf
     
        <div class="form-group">
            <label for="description">Ad Type</label>
            <select class="form-control" name="ad_type">
                <option {{ (isset($ad->ad_type) && $ad->ad_type == 'New') ? "selected=\"selected\"" : "" }}>New</option>
                <option {{ (isset($ad->ad_type) && $ad->ad_type == 'Refurbished') ? "selected=\"selected\"" : "" }}>Refurbished</option>
                <option {{ (isset($ad->ad_type) && $ad->ad_type == 'Used') ? "selected=\"selected\"" : "" }}>Used</option>
              
            </select>
        </div>
   
<div class="row">
        <div class="col-md-6">
      
   
        <div class="form-group">
            <label for="Quantity">Quantity</label><br/>
         <input type="text"  value="{{ $ad->qty ?? '' }}" class="form-control" id="Quantity" name="qty"/>
        </div>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="Quantity">Price</label><br/>
         <input type="text"  value="{{ $ad->ad_price ?? '' }}" class="form-control" id="price" name="ad_price"/>
        </div>
    </div>
</div>
        <input type="hidden"  value="{{ $ad->id ?? '' }}" class="form-control" id="nid" name="nid"/>
          <input type="hidden"  value="3" class="form-control" id="step" name="step"/>
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
         
        <button type="submit" class="btn btn-primary"> Next</button>
    </form>
   @php
   $ad = $ad->id ;
    @endphp
     <a style="margin-top:20px; " class="btn btn-warning" href="{{route('admin.ads.create-step2',compact('ad'))}}">
                {{ trans('Previous') }}
            </a>
</div>
</div>

@endsection