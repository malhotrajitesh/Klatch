@extends('layouts.admin')
@section('content')
<div class="container">
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



@if(session('error'))
  <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
    {{session('error')}}
  </div>
@endif

   <div class="row justify-content-center">

     
  
                  <div class="col-md-8 my-5">
                  	 	 <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$profile->prog ?? ''}}%">
   {{$profile->prog ?? ''}}%
  </div>
</div> 
&nbsp;

 <div class="row mb-3">
                <div class="col-md-2 text-center">
                    @if(!empty($profile->propic))
                      <img class="p-0 profilepicture rounded-circle" style="width:128px; height: 128px; " src="{{ URL::asset("/public/image/".$profile->propic ?? '') }}"   data-toggle="modal" data-target="#uploadphoto">   
                    @else 
                       <i class="fas fa-user-circle fa-10x text-muted"  data-toggle="modal" data-target="#uploadphoto"></i>
                    @endif   



                    {{-- Upload Photo --}}
                <div class="modal fade" id="uploadphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <form action="{{ route("admin.profiles.uploadpic") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                          <h5 class="modal-title text-info" id="exampleModalLabel">Upload Photo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body editworksbody">
                          <div class="form-group">
                            <input type="file" class="form-control-file text-center" id="profilepicture" name="propic" aria-describedby="fileHelp">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                </div>
                <div class="col-md-10 pl-5">
                    <h3 class="h3 text-info d-inline-block">{{$profile->name ?? ''}}</h3>     
               
                      <button class="btn btn-default float-right" data-toggle="modal" data-target="#addprofile"><i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span></button>
                   
                    <h5 class="h5">
                       @if ($profile !== null)
                         {{$profile->mobile ?? ''}}
                       @endif 

                    </h5>
                    <small class="h6 text-muted"><i class="fas fa-map-marker-alt"></i>  
                     
                         {{$profile->mobile ?? ''}}, {{$profile->email ?? ''}} {{$profile->address ?? ''}}
                      </small>
                </div>
            </div>

            {{-- Edit Profile --}}
         
              <div class="modal fade" id="addprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-info" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body editworksbody">
             @if ($profile->id ?? '' !== '')
                  	 <form action="{{ route("admin.profiles.update", [$profile->id ?? '']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @else
                  	
                  	    <form action="{{ route("admin.profiles.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
                 @endif 	 

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Name</span>
                      </div>
                      <input type="text" id="name" class="form-control" name="name" value="{{ old('name', isset($profile) ? $profile->name : '') }}">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt" va></i>&nbsp;Mobile</span>
                      </div>
                      <input type="text" id="mobile" class="form-control"  name="mobile" value="{{ old('mobile', isset($profile) ? $profile->mobile : '') }}">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Email</span>
                      </div>
                      <input type="text" id="email" class="form-control"  name="email" value="{{ old('email', isset($profile) ? $profile->email : '') }}">
                    </div>
                 
                    <div class="form-group">
                      <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Address</span>
                      <textarea class="form-control" id="address"  name="address" rows="3">{{ old('address', isset($profile) ? $profile->address : '') }}</textarea>
                    </div>
                    <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
                             <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            
        </form>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 
                  </div>
                </div>
              </div>
        </div>


            <div class="row mb-3">
                <div class="col-12">
                  <h4 class="h5 text-info">Address</h4>
                  <p>{{ old('address', isset($profile) ? $profile->address : '') }}</p>
                </div>
            </div>  

          <div class="card mb-0">
                    <div class="card-header">
                        <a class="card-title">
                           <h5 class="d-inline-block h5 font-weight-bold mb-0">Skills</h5>
                           <button class="btn btn-default float-right py-0 px-1" data-toggle="modal" data-target="#editskills">
                                <i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span>
                            </button> 
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addskills">
                                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                    @if ($profile->id ?? '' !== '')
                       @foreach($profile->skills as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach
            @endif

                    </div>

                    <!-- Edit Skills Modal -->
                    <div class="modal fade" id="editskills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
                 <form action="{{ route("admin.profiles.pskill") }}" method="POST" enctype="multipart/form-data">
            @csrf
                       
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body editskillsbody">
                                  <label>Skills *
      <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span>
                  </label>
            <select name="skills[]" id="skills" class="form-control select2" multiple="multiple" required>
                @foreach($skills as $id => $skills)
                <option value="{{ $id }}" {{ (in_array($id, old('skills', [])) || isset($profile) && $profile->skills->contains($id)) ? 'selected' : '' }}>{{ $skills }}</option>
                @endforeach
            </select>
            <input type="hidden" name="pid" value="{{$profile->id ?? ''}}">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                     </form>
                    </div>

                    <!-- Add Skills Modal -->
                    <div class="modal fade" id="addskills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <form action="{{ route("admin.skills.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">                                
                                <h5 class="modal-title" id="exampleModalLabel">Add New Skill</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body addskillsbody">
                                   
            
            	  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
             
            </div>
              <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">

     
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                     </form>
                    </div>


                    <div class="card mb-0">
               <div class="card-header">
                @can('uedu_create')
                        <a class="card-title">
                          <h5 class="d-inline-block h5 font-weight-bold mb-0">Educational Background</h5> 
                            <a class="btn btn-primary float-right  py-0 mr-1 px-1" data-custom='open_modal' href="{{ route("admin.educations.create") }}">
                                      
                                
                         
                            <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                               </a> 
                        </a>
                        @endcan
                    </div>
                    <div class="card-body" id="educationBackgroundBody"> 
                    @foreach($educations as $key => $education)

                        <div>
                           <p class="float-right text-danger targetEducDiv"><i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteEducation{{$education->id}}"></i></p> 
                      
                           @can('uedu_edit')
                          <p class="float-right text-info mr-4"><i class="fas fa-pencil-alt" data-id="{{$education->id}}" data-custom='open_modal2' href="{{ route('admin.educations.edit', $education->id) }}"></i></p>
                          @endcan
                           <h5 class="h5 text-info">{{ $education->college ?? '' }}</h5>                            
                           <h6 class="h6 text-black">{{ $education->degree_name ?? '' }}</h6> 
                           <small class="h6 mb-2 text-muted">{{ $education->fos ?? '' }}</small>
                           <div class="mt-3 text-info">{{ $education->uplace ?? '' }}</div>
                           <hr>
                        </div>

                          <div class="modal fade" id="deleteEducation{{$education->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4>REMOVE EDUCATION</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$education->degree_name}}"</span> from your profile?</h6>
                                     
                                   
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                          <form action="{{ route('admin.educations.destroy', $education->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       
                                      <button type="submit" class="btn btn-primary deleteEducation px-5">Yes</button>
                                       </form>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                    
                    @endforeach
                     </div>
                  
                    <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 font-weight-bold mb-0">Work History</h5>
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-custom='open_modal3' href="{{ route("admin.experiances.create") }}">
                                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                           </button>
                        </a>
                    </div>
                    <div>
                        <div class="card-body workBackgroundBody">
                         @foreach($experiances as $key => $experiance)
                          <div>
                            <p class="float-right text-danger targetWorkDiv">
                              <i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteWork{{$experiance->id}}"></i>
                            </p>  
                            <p class="float-right text-info mr-4">
                                <i class="fas fa-pencil-alt" data-id="{{$experiance->id}}"  data-toggle="modal" data-custom='open_modal5' href="{{ route('admin.experiances.edit', $experiance->id) }}"></i>
                            </p>
                             <h5 class="h5 text-info"> {{ $experiance->exp_type ?? '' }}</h5>                            
                             <h6 class="h6 text-black">{{ $experiance->etitle ?? '' }}</h6> 
                             <small class="h6 mb-2 text-muted">{{ $experiance->emp_type ?? '' }}</small>
                             <div class="mt-3 text-muted">{{ $experiance->cmp_name ?? '' }}</div>
                             <hr>
                           </div>
  <!--  Delete Model for work -->
                                     <div class="modal fade" id="deleteWork{{$experiance->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4>REMOVE EDUCATION</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$experiance->exp_type}}"</span> from your profile?</h6>
                                     
                                   
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                          <form action="{{ route('admin.experiances.destroy', $experiance->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       
                                      <button type="submit" class="btn btn-primary deleteWork px-5">Yes</button>
                                       </form>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
 @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

          


   

@endsection
@section('scripts')
@parent

<script>
   $("body").on('click', "[data-custom='open_modal']", function (event) {
    
      event.preventDefault();
      var btn = $(this);
      var link = $(this).attr('href');
      var title = $(this).text();
      $('#custom_modal_resource').remove();
      var modal = '<div class="modal fade" id="custom_modal_resource" role="dialog">\
      <div class="modal-dialog modal-lg" role="document">\
      <div class="modal-content">\
      <div class="modal-header">\
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
      <h4 class="modal-title">'+ title + '</h4>\
      </div>\
      <div class="modal-body">\
      \
      </div>\
      </div>\
      </div>\
      </div>';
      $('body').append(modal);
      $('#custom_modal_resource').modal('show');
     // $('#custom_modal_resource .modal-body').empty();
      $('#custom_modal_resource .modal-body').load(link);
    });

</script>
<!--
<script>
  
$(document).on('hidden.bs.modal', '.modal', function (e) {

    $(this).find(".modal-content").empty();

    $(this).removeData('bs.modal');
    $(this).remove('bs.modal');

    alert("jio");
});
</script>
-->

<script>
   $("body").on('click', "[data-custom='open_modal2']", function (event) {
    
      event.preventDefault();
      var btn = $(this);
      var link = $(this).attr('href');
      var title = $(this).text();
      $('#eedit').remove();
      var modal = '<div class="modal fade" id="eedit" role="dialog">\
      <div class="modal-dialog modal-lg" role="document">\
      <div class="modal-content">\
      <div class="modal-header">\
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
      <h4 class="modal-title">'+ title + '</h4>\
      </div>\
      <div class="modal-body">\
      \
      </div>\
      </div>\
      </div>\
      </div>';
      $('body').append(modal);
      $('#eedit').modal('show');
     
      $('#eedit .modal-body').load(link);
    });

</script>

<script>
   $("body").on('click', "[data-custom='open_modal3']", function (event) {
    
      event.preventDefault();
      var btn = $(this);
      var link = $(this).attr('href');
      var title = $(this).text();
      $('#wadd').remove();
      var modal = '<div class="modal fade" id="wadd" role="dialog">\
      <div class="modal-dialog modal-lg" role="document">\
      <div class="modal-content">\
      <div class="modal-header">\
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
      <h4 class="modal-title">'+ title + '</h4>\
      </div>\
      <div class="modal-body">\
      \
      </div>\
      </div>\
      </div>\
      </div>';
      $('body').append(modal);
      $('#wadd').modal('show');
     
      $('#wadd .modal-body').load(link);
    });

</script>
<script>
   $("body").on('click', "[data-custom='open_modal5']", function (event) {
    
      event.preventDefault();
      var btn = $(this);
      var link = $(this).attr('href');
      var title = $(this).text();
      $('#wedit').remove();
      var modal = '<div class="modal fade" id="wedit" role="dialog">\
      <div class="modal-dialog modal-lg" role="document">\
      <div class="modal-content">\
      <div class="modal-header">\
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
      <h4 class="modal-title">'+ title + '</h4>\
      </div>\
      <div class="modal-body">\
      \
      </div>\
      </div>\
      </div>\
      </div>';
      $('body').append(modal);
      $('#wedit').modal('show');
     
      $('#wedit .modal-body').load(link);
    });

</script>

<!--<style>
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

</style>-->

@endsection
