@extends('layouts.admin')
@section('content')

<div class="card">

  <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
   

    <div class="card-body" style="background-color: #c8ced3;">
        <div class="row justify-content-center">

     
  
                  <div class="col-md-8 my-5">

   
                     
                        <div class="card mb-3">
                          <h5 class="h5 card-header">
                          <div class="row">
                         
    <div class="col">
      <span style="color: red;"> <strong>{{$profile->name ?? ''}}</strong></span> </div>
<div class="col">
    <span> Basic Details </span>
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
                     
                       
               



  <div class="card mb-0">
                    <div class="card-header">
                     
                           <span>Skills</span>
                         
                    </div>
                    <div class="card-body">
                
                       @foreach($skills as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach
          

                    </div>




              <div class="card mb-0">
               <div class="card-header">
              
                      
                          <span>Educational Background</span> 
                          
                      
                       
                    </div>
                    <div class="card-body" id="educationBackgroundBody"> 
                    @foreach($educations as $key => $education)

                        <div>
                     
                      
                         
                           <h5>{{ $education->college ?? '' }}</h5>                            
                           <h6 class="h6 text-black">{{ $education->degree_name ?? '' }}</h6> 
                           <small class="h6 mb-2 text-muted">{{ $education->fos ?? '' }}</small>
                           <div class="mt-3 text-info">{{ $education->uplace ?? '' }}</div>
                           <hr>
                        </div>

                     
                    
                    @endforeach
                     </div>
                  
                    <div class="card-header">
                       
                          <span>Work History</span>
                        
                    </div>
                    <div>
                        <div class="card-body workBackgroundBody">
                         @foreach($experiances as $key => $experiance)
                          <div>
                        
                             <h5> {{ $experiance->exp_type ?? '' }}</h5>                            
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
@section('scripts')
<style>
 .card-header
{
    text-align: center;
    height: 50px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
   box-shadow: 0 4px 8px 0 #0072ff, 0 6px 20px 0 #8811c5;
} 

.card .mb-3{
  box-shadow: 0 4px 8px 0 #0072ff, 0 6px 20px 0 #8811c5;
}
.card .mb-0{
  box-shadow: 0 4px 8px 0 #0072ff, 0 6px 20px 0 #8811c5;
}

.card .mb-3:hover {
  box-shadow: 0 4px 8px 0 #8811c5, 0 6px 20px 0 #0072ff;
}
.card .mb-0:hover {
  box-shadow: 0 4px 8px 0 #8811c5, 0 6px 20px 0 #0072ff;
}

h5{
  color: black;
  text-shadow: 1px 1px 2px black, 0 0 25px #8811c5, 0 0 5px #0072ff;
}

</style>


@endsection
