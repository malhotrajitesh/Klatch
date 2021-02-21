@extends('layouts.admin')
@section('content')

<div class="card">

  <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
   

    <div class="card-body">
        <div class="row justify-content-center">

     
  
                  <div class="col-md-8 my-5">

   
                        @foreach ($profiles as $profile)
                        <div class="card mb-3">
                          <h5 class="h5 card-header">
                          <div class="row">
                         
    <div class="col">
      <span style="color: red;"> <strong>{{$profile->name ?? ''}}</strong></span> </div>
<div class="col">
    <span style="color: blue; "> Basic Details </span>
</div>
<div class="col">
     <form action="{{ route('admin.applyjobs.store') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="uid" value="{{$uid}}">
                                        <input type="hidden" name="jid" value="{{$jid}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <select name="jstatus">
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
                                
                               

                                <span>Member Since: {{$profile->created_at}}</span>
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
                       
               



  <div class="card mb-0">
                    <div class="card-header">
                        <a class="card-title">
                           <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Skills</h5>
                         
                    </div>
                    <div class="card-body">
                
                       @foreach($skills as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach
          

                    </div>




              <div class="card mb-0">
               <div class="card-header">
              
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Educational Background</h5> 
                          
                        </a>
                       
                    </div>
                    <div class="card-body" id="educationBackgroundBody"> 
                    @foreach($educations as $key => $education)

                        <div>
                     
                      
                         
                           <h5 class="h5 text-info">{{ $education->college ?? '' }}</h5>                            
                           <h6 class="h6 text-black">{{ $education->degree_name ?? '' }}</h6> 
                           <small class="h6 mb-2 text-muted">{{ $education->fos ?? '' }}</small>
                           <div class="mt-3 text-info">{{ $education->uplace ?? '' }}</div>
                           <hr>
                        </div>

                     
                    
                    @endforeach
                     </div>
                  
                    <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Work History</h5>
                        
                    </div>
                    <div>
                        <div class="card-body workBackgroundBody">
                         @foreach($experiances as $key => $experiance)
                          <div>
                        
                             <h5 class="h5 text-info"> {{ $experiance->exp_type ?? '' }}</h5>                            
                             <h6 class="h6 text-black">{{ $experiance->etitle ?? '' }}</h6> 
                             <small class="h6 mb-2 text-muted">{{ $experiance->emp_type ?? '' }}</small>
                             <div class="mt-3 text-muted">{{ $experiance->cmp_name ?? '' }}</div>
                             <hr>
                           </div>
 
 @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
</div>
@endsection