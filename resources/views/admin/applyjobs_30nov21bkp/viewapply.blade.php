@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
    
	@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

  @if(count($errors)>0)
  <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
    <ul>
      @foreach($errors->all() as $error)
        <li style="list-style: none;">{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
       
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('Applicants') }} {{ trans('Details') }}
          <a class="btn btn-success" style="float: right;" href="{{ route("admin.jobs.index") }}">
                {{ trans('Back') }} 
            </a>
    </div>
  <div class="card-body col-lg-9">
                      @if(count($profiles) > 0)
                        @foreach ($profiles as $profile)
                        <div class="card mb-3">
                          <h5 class="h5 card-header">
                          <div class="row">
                         
    <div class="col">
      <span style="color: red;"> <strong>{{$profile->name ?? ''}}</strong></span></div>
      <div class="col">
        <span style="color: red;"> <strong>{{$profile->status ?? ''}}</strong></span>
      </div>
       
     <div class="col">
    <a  class="text-info" style="float: right;" id="{{$profile->id}}" href="{{ route('admin.profiles.profilev',['pid' => $profile->id, 'uid' => $profile->user_id,'jid' => $profile->job_id]) }}">View Profile</a> </div></div></h5>
                           
                            <div class="card-block px-3"> 
                               
                               <img class="p-0 logo rounded-circle" style="width:128px; height: 128px; float: left; " src="{{ URL::asset("/public/image/".$profile->propic ?? '') }}">   </img>    &nbsp;                   
                              <p class="small">
                                
                               

                                <span>Member Since: {{$profile->created_at->diffForHumans()}}</span>
                              </p>
                              <p class="small">
                                <span><span class="text-success"><i class="fas fa-briefcase"></i> Email:</span>{{$profile->email ?? ''}} </span> 
                                <br>
                                <span><span class="text-success"><i class="fas fa-hourglass-end"></i> Mobile:</span>
                                {{$profile->mobile ?? ''}} 
           </span>
            
                                <br>

                                <span><span class="text-success"><i class="fas fa-tags"></i> Address:</span> {{$profile->address ?? ''}} </span>
                              </p>
                            

                          </div>
                        </div>      
                        @endforeach
                       
                    @else 
                      <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
                    @endif
                  </div>
    <a class="btn btn-success" style="float: right;" href="{{ route("admin.jobs.index") }}">
                {{ trans('Back') }} 
            </a>
</div>
@endsection
@section('scripts')
@parent


@endsection