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
        {{ trans('Interested') }} {{ trans('Persons Details') }}
          <a class="btn btn-success" style="float: right;" href="{{ route("admin.events.index") }}">
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
     <form action="{{ route('admin.applyevents.store') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="uid" value="{{$profile->user_id}}">
                                        <input type="hidden" name="eid" value="{{$profile->ivent_id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <select name="status">
                                        <option value="Hired">Hired</option>
                                        <option value="Shortlisted">Shortlisted</option> 
                                        <option value="Rejected">Rejected</option> 
                                        </select> 
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('Assign') }}">
                                    </form>
    </div>
       
   </div></h5>
                           
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
    <a class="btn btn-success" style="float: right;" href="{{ route("admin.events.index") }}">
                {{ trans('Back') }} 
            </a>
</div>
@endsection
@section('scripts')
@parent


@endsection