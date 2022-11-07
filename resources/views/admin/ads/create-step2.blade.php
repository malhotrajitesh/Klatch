@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       {{ trans('Ad  Details') }} {{ trans('Step 2') }}
    </div>
                
                         <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$ad->adprog ?? ''}}%">
   {{$ad->adprog ?? ''}}%
  </div>
</div> 
    <div class="card-body">
    <form action="{{ route('admin.ads.postCreateStep2') }}" method="post">
      @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{ $ad->adti ?? '' }}" class="form-control" id="taskTitle"  name="adti">
        </div>
           <div class="form-group">
            <label for="description">  Description</label>
         
              <textarea type="text"  class="form-control" id="taskDescription" name="adtd">{{ $ad->adtd ?? '' }}</textarea>
        </div>
      
     <div class="row">
        <div class="col-md-3">
             <div class="form-group">
            <label for="long">Longitude</label><br/>
         <input type="text"  value="{{ $ad->longitude ?? '' }}" class="form-control" id="Longitude" name="longitude"/>
        </div>
    </div>
     <div class="col-md-3">
          <div class="form-group">
            <label for="lat">Latitude</label><br/>
         <input type="text"  value="{{ $ad->latitude ?? '' }}" class="form-control" id="latitude" name="latitude"/>
        </div>
    </div><!--
    <div class="col-md-3">
          <div class="form-group">
            <label for="description"> Address</label>
         
              <textarea type="text"  class="form-control" id="address" name="ad_address">{{ $ad->ad_address ?? '' }}</textarea>
        </div>
    </div>
          <div class="col-md-3">
        <div class="form-group">
            <label for="City">Area</label><br/>
         <input type="text"  value="{{ $ad->ad_area ?? '' }}" class="form-control" id="area" name="ad_area"/>
        </div>
    </div> -->
</div>
    <div class="row">

           <div class="col-md-3">
        <div class="form-group">
            <label for="City">City</label><br/>
         <input type="text"  value="{{ $ad->ad_city ?? '' }}" class="form-control" id="city" name="ad_city"/>
        </div>
    </div>

          <div class="col-md-3">
        <div class="form-group">
            <label for="State">State</label><br/>
         <input type="text"  value="{{ $ad->ad_state ?? '' }}" class="form-control" id="State" name="ad_state"/>
        </div>
    </div>
<!--
          <div class="col-md-3">
        <div class="form-group">
            <label for="State">Country</label><br/>
         <input type="text"  value="{{ $ad->ad_cnt ?? '' }}" class="form-control" id="Country" name="ad_cnt"/>
        </div>
    </div>
--->

      <div class="col-md-3">
          <div class="form-group">
             <label for="ad_pincode"> Pincode</label>
             <input type="text"  value="{{ $ad->ad_pincode ?? '' }}"  maxlength="6" class="form-control" id="ad_pincode" name="ad_pincode"/>
        </div>
    </div>
</div>
        <input type="hidden"  value="{{ $ad->id ?? '' }}" class="form-control" id="nid" name="nid"/>
          <input type="hidden"  value="2" class="form-control" id="step" name="step"/>
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
     <a style="margin-top:20px;" class="btn btn-default" href="{{route('admin.ads.create-step1',compact('ad'))}}">
                {{ trans('Previous') }}
            </a>
</div>
</div>

@endsection