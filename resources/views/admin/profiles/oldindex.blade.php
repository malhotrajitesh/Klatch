@extends('layouts.admin')
@section('content')

<div class="card">
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">

            <div class="row mb-3">
                <div class="col-md-2 text-center">
                    @if(!empty($profiles->photo))
                      <img class="p-0 profilespicture rounded-circle" src="/storage/photo/{{$profiles->propic}}"   data-toggle="modal" data-target="#uploadphoto{{Auth::user()->id}}">   
                    @else 
                       <i class="fas fa-user-circle fa-10x text-muted"  data-toggle="modal" data-target="#uploadphoto{{Auth::user()->id}}"></i>
                    @endif   



                    {{-- Upload Photo --}}
                <div class="modal fade" id="uploadphoto{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <form action="#" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                          <h5 class="modal-title text-info" id="exampleModalLabel">Upload Photo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body editexperiancesbody">
                          <div class="form-group">
                            <input type="file" class="form-control-file text-center" id="profilespicture" name="profilespicture" aria-describedby="fileHelp">
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
                    <h3 class="h3 text-info d-inline-block"></h3>     
                     @if ($profiles !== null)
                     <button class="btn btn-default float-right" data-toggle="modal" data-target="#editprofiles{{Auth::user()->id}}"><i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span></button>
                    @else
                      <button class="btn btn-default float-right" data-toggle="modal" data-target="#addprofiles{{Auth::user()->id}}"><i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span></button>
                    @endif 
                    <h5 class="h5">
                       @if ($profiles !== null)
                        
                       @endif 

                    </h5>
                    <small class="h6 text-muted"><i class="fas fa-map-marker-alt"></i>  
                      @if ($profiles !== null)
                       
                       @endif</small>
                </div>
            </div>

            {{-- Edit profiles --}}
            @if ($profiles !== null)
            <div class="modal fade" id="editprofiles{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @else
              <div class="modal fade" id="addprofiles{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @endif 
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-info" id="exampleModalLabel">Edit profiles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body editexperiancesbody">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Title</span>
                      </div>
                      <input type="text" id="editJobTitle" class="form-control" name="name" value="">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt" va></i>&nbsp;City</span>
                      </div>
                      <input type="text" id="editCity" class="form-control"  name="email" value="">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Province</span>
                      </div>
                      <input type="text" id="editProvince" class="form-control"  name="mobile" value="">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Country</span>
                      </div>
                      <input type="text" id="editCountry" class="form-control"  name="address" value="">
                    </div>
                 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     @if ($profiles !== null)
                     <button type="submit" class="btn btn-primary editprofilesButton" data-dismiss="modal" data-id="{{Auth::user()->id}}">Save changes</button>
                    @else
                     <button type="submit" class="btn btn-primary addprofilesButton" data-dismiss="modal">Save changes</button>
                    @endif 
                  </div>
                </div>
              </div>
        </div>


            <div class="row mb-3">
                <div class="col-12">
                  <h4 class="h5 text-info">Overview</h4>
                  
                </div>
            </div>      
                <div class="card mb-0">
                    <div class="card-header">
                        <a class="card-title">
                           <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Skills</h5>
                           <button class="btn btn-default float-right py-0 px-1" data-toggle="modal" data-target="#editskills{{Auth::user()->id}}">
                                <i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span>
                            </button> 
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addskills{{Auth::user()->id}}">
                                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                  

                    </div>

                    <!-- Edit Skills Modal -->
                    <div class="modal fade" id="editskills{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <form action="{{ route("admin.skills.update", [Auth::user()->id]) }}" method="post">
                        {{ csrf_field() }}
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body editskillsbody">
                                 <select class="form-control selectedskills" multiple="multiple" placeholder="Select State" name="skills[]">
                                      <option></option>
                                      @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                      @endforeach
                                  </select>
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
                    <div class="modal fade" id="addskills{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <form action="{{ route("admin.skills.store") }}" method="post">
                        {{ csrf_field() }}
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">                                
                                <h5 class="modal-title" id="exampleModalLabel">Add New Skill</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body addskillsbody">
                                     <div class="form-group col-xs-12">
                                      
                                        <select class="form-control select2" multiple="multiple" placeholder="Select State" name="skills[]">
                                          <option></option>
                                          @foreach($skills as $skill)
                                            <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                          @endforeach
                                      </select>
                                     </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                     </form>
                    </div>




                    <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Educational Background</h5>  
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addeducation{{Auth::user()->id}}">
                            <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                           </button>
                        </a>
                    </div>
                    <div class="card-body" id="educationBackgroundBody">                       
                        @foreach($educations as $education)
                        <div>
                          <p class="float-right text-danger targetEducDiv"><i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteEducation{{$education->id}}"></i></p>  
                          <p class="float-right text-info mr-4"><i class="fas fa-pencil-alt" data-id="{{$education->id}}" data-toggle="modal" data-target="#editeducation{{$education->id}}"></i></p>
                           <h5 class="h5 text-info">{{$education->college }}</h5>                            
                           <h6 class="h6 text-black">{{$education->degree_name}}</h6> 
                           <small class="h6 mb-2 text-muted">{{ $education->total_no  }}</small>
                           <div class="mt-3 text-info">{!! $education->fos  !!}</div>
                           <hr>
                        </div>

                          <!-- Edit Educational Background Modal -->
                          <div class="modal fade" id="editeducation{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <form>
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-info" id="exampleModalLabel">Edit Educational Background</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body addeducationbody">                                
                                            @csrf
            @method('PUT')
        

                <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;University/College</span>
                            </div>
                            <input type="text" class="form-control" name="college" value="{{ old('college', isset($education) ? $education->college : '') }}" required>
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Degree</span>
                            </div>
            <input type="text" id="degree" class="form-control" name="degree_name" value="{{ old('degree_name', isset($education) ? $education->degree_name : '') }}" required>
            <input type="hidden" id="degreen" class="form-control" value="" >
      </div>
      </div> 
    </div>
    <br>
<div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Field Of Study</span>
                            </div>
                            <input type="text" class="form-control" name="fos" value="{{ old('fos', isset($education) ? $education->fos : '') }}">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Location</span>
                            </div>
            <input type="text" id="place" class="form-control"
                  name="uplace" value="{{ old('uplace', isset($education) ? $education->uplace : '') }}" required>
      </div>
      </div> 
    </div>
<br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Start Date</span>
                            </div>
                            <input type="text" class="form-control date" name="e_from" value="{{ old('e_from', isset($education) ? $education->e_from : '') }}" required>
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;End Date</span>
                            </div>
            <input type="text" id="place" class="form-control date" name="e_to" value="{{ old('e_to', isset($education) ? $education->e_to : '') }}" required>
      </div>
      </div> 
    </div>

    <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Obtained Marks</span>
                            </div>
                            <input type="text" class="form-control" name="get_no" value="{{ old('get_no', isset($education) ? $education->get_no : '') }}">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Total Marks</span>
                            </div>
            <input type="text" id="place" class="form-control" name="total_no" value="{{ old('total_no', isset($education) ? $education->total_no : '') }}">
      </div>
      </div> 
    </div>

     <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-flag"></i>&nbsp;Grade</span>
                            </div>
                            <input type="text" class="form-control" name="ugrade" title="optional" value="{{ old('ugrade', isset($education) ? $education->ugrade : '') }}">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-spinner fa-pulse fa-fw"></i>&nbsp;Activies</span>
                            </div>
            <input type="text" id="placeu" class="form-control" name="xtra" value="{{ old('xtra', isset($education) ? $education->xtra : '') }}">
      </div>
      </div> 
    </div>
    <br>
     <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-quote-left"></i>&nbsp;Description</span>
                            </div>
                            <input type="text" class="form-control" name="udesc" title="optional" value="{{ old('udesc', isset($education) ? $education->udesc : '') }}">
                          </div></div>
            

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary editEducation" data-dismiss="modal" data-id="{{$education->id}}">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                             </form>
                          </div>{{-- end modal --}}




                          <!-- Delete Education Modal -->
                              <div class="modal fade" id="deleteEducation{{$education->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4>REMOVE EDUCATION</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$education->college}}"</span> from your profiles?</h6>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                      <button type="button" class="btn btn-primary deleteEducation px-5" data-dismiss="modal" data-id="{{$education->id}}">Yes</button>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                          @endforeach
                    </div>



                    <!-- Add Educational Background Modal -->
                    <div class="modal fade" id="addeducation{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <form>
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLabel">Add Educational Background</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body addeducationbody">                                
                                        @csrf
<div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;University/College</span>
                            </div>
                            <input type="text" class="form-control" name="college">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Degree</span>
                            </div>
            <input type="text" id="degree" class="form-control" name="degree_name" value="">
            <input type="hidden" id="degreen" class="form-control" value="" >
      </div>
      </div> 
    </div>
    <br>
<div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Field Of Study</span>
                            </div>
                            <input type="text" class="form-control" name="fos">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Location</span>
                            </div>
            <input type="text" id="place" class="form-control"
                  name="uplace">
      </div>
      </div> 
    </div>
<br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Start Date</span>
                            </div>
                            <input type="text" class="form-control date" name="e_from">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;End Date</span>
                            </div>
            <input type="text" id="place" class="form-control date" name="e_to">
      </div>
      </div> 
    </div>

    <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Obtained Marks</span>
                            </div>
                            <input type="text" class="form-control" name="get_no">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Total Marks</span>
                            </div>
            <input type="text" id="place" class="form-control" name="total_no">
      </div>
      </div> 
    </div>

     <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-flag"></i>&nbsp;Grade</span>
                            </div>
                            <input type="text" class="form-control" name="ugrade" title="optional">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-spinner fa-pulse fa-fw"></i>&nbsp;Activies</span>
                            </div>
            <input type="text" id="placeu" class="form-control" name="xtra">
      </div>
      </div> 
    </div>
    <br>
     <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-quote-left"></i>&nbsp;Description</span>
                            </div>
                            <input type="text" class="form-control" name="udesc" title="optional">
                          </div></div>

 
              <input type="hidden" name="created_by_id ?? ''" value="{{Auth::user()->id}}">
            <div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" id="addNewEducation">Save changes</button>
                              </div>
                            </div>
                          </div>
                       </form>
                    </div>



                    <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">experiance History</h5>
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addexperiance{{Auth::user()->id}}">
                                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                           </button>
                        </a>
                    </div>
                    <div>
                        <div class="card-body experianceBackgroundBody">
                         @foreach($experiances as $experiance)
                          <div>
                            <p class="float-right text-danger targetexperianceDiv">
                              <i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteexperiance{{$experiance->id}}"></i>
                            </p>  
                            <p class="float-right text-info mr-4">
                                <i class="fas fa-pencil-alt" data-id="{{$experiance->id}}" data-toggle="modal" data-target="#editexperiance{{$experiance->id}}"></i>
                            </p>
                             <h5 class="h5 text-info">{{$experiance->exp_type}}</h5>                            
                             <h6 class="h6 text-black">{{$experiance->etitle }}</h6> 
                             <small class="h6 mb-2 text-muted">{{ $experiance->emp_type }}</small>
                             <div class="mt-3 text-muted">{!! nl2br(e($experiance->cmp_name )) !!}</div>
                             <hr>
                           </div>

                    <!-- Edit experiance Background Modal -->
                            <div class="modal fade" id="editexperiance{{$experiance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-info" id="exampleModalLabel">Edit experiance Background</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body editexperiancesbody">
                                       @csrf
            @method('PUT')

            <div class="row">
    <div class ="col-md-12">
               <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Previous Experiance</span>
                            </div>
                             <select class="form-control" id="uvaver" name="exp_type">
                 
                          <option value="Fresher" {{ (isset($experiance->exp_type) && $experiance->exp_type == 'Fresher') ? "selected=\"selected\"" : "" }}>Fresher</option>
                          <option value="Intern" {{ (isset($experiance->exp_type) && $experiance->exp_type == 'Intern') ? "selected=\"selected\"" : "" }}>Intern</option>
                          <option value="No Experience" {{ (isset($experiance->exp_type) && $experiance->exp_type == 'No Experience') ? "selected=\"selected\"" : "" }}>No Experience</option>
                          <option value="Work Experience" {{ (isset($experiance->exp_type) && $experiance->exp_type == 'Work Experience') ? "selected=\"selected\"" : "" }}>Work Experience</option>
                </select>
                           
                          </div></div>
                            </div>
                            <div id="uvaexp">
                            <div class="row">
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Title</span>
                            </div>
            <input type="text" id="degree" class="form-control" name="etitle" value="{{ old('etitle', isset($experiance) ? $experiance->etitle : '') }}">
            
      </div>
      </div> 
  
    <br>

    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Employment Type</span>
                            </div>
                          
                              <select class="form-control" id="etype" name="emp_type">
             
                          <option value="Part-Time" {{ (isset($experiance->emp_type) && $experiance->emp_type == 'Part-Time') ? "selected=\"selected\"" : "" }}>Part-Time</option>
                          <option value="Full-Time" {{ (isset($experiance->emp_type) && $experiance->emp_type == 'Full-Time') ? "selected=\"selected\"" : "" }}>Full-Time</option>
                           <option value="Contract" {{ (isset($experiance->emp_type) && $experiance->emp_type == 'Contract') ? "selected=\"selected\"" : "" }}>Contract</option>
                         
                </select>
                          </div></div>
                        </div>
                        <br>
                        <div class="row">
        <div class ="col-md-4">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Company Name</span>
                            </div>
            <input type="text" id="place" class="form-control"
                  name="cmp_name" value="{{ old('cmp_name', isset($experiance) ? $experiance->cmp_name : '') }}">
      </div>
      </div> 
   
<br>
    
    <div class ="col-md-4">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Company Location</span>
                            </div>
                            <input type="text" class="form-control" name="cmp_loc" value="{{ old('cmp_loc', isset($experiance) ? $experiance->cmp_loc : '') }}">
                          </div></div>
        <div class ="col-md-4">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Current Job</span>
                            </div>
            <input type="checkbox" id="checkbox" class="form-control" name="c_job" value="{{ old('c_job', isset($experiance) ? $experiance->c_job : '')  }}">
      </div>
      </div> 
    </div>

    <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Start Date</span>
                            </div>
                            <input type="text" class="form-control date" name="estart" value="{{ old('estart', isset($experiance) ? $experiance->estart : '') }}">
                          </div></div>
        <div class ="col-md-6" id="uend">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;End Date</span>
                            </div>
            <input type="text" id="not" class="form-control date" name="exend" value="{{ old('exend', isset($experiance) ? $experiance->exend : '') }}">
      </div>
      </div> 
    </div>

    </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary editexperianceBackground" data-dismiss="modal" data-id="{{$experiance->id}}">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <!-- Delete experiance Modal -->
                              <div class="modal fade" id="deleteexperiance{{$experiance->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4>REMOVE EMPLOYMENT</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$experiance->exp_type}}"</span> from your profiles?</h6>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                      <button type="button" class="btn btn-primary deleteexperiance px-5" data-dismiss="modal" data-id="{{$experiance->id}}" >Yes</button>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
           

                        @endforeach
                        </div>
                    </div>
                </div>                

                    <!-- Add experiance History Modal -->
                    <div class="modal fade" id="addexperiance{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLabel">Add New experiance</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body editexperiancesbody">
                                 @csrf
<div class="row">
    <div class ="col-md-12">
               <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Previous Experiance</span>
                            </div>
                             <select class="form-control" id="uvaver" name="exp_type">
                  <option selected disabled value="0">...Select Previous Experiance</option>
                          <option value="Fresher">Fresher</option>
                          <option value="Intern">Intern</option>
                          <option value="No Experience">No Experience</option>
                          <option value="Work Experience">Work Experience</option>
                </select>
                           
                          </div></div>
                            </div>
                            <div id="uvaexp">
                            <div class="row">
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Title</span>
                            </div>
            <input type="text" id="degree" class="form-control" name="etitle" value="">
            
      </div>
      </div> 
  
    <br>

    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Employment Type</span>
                            </div>
                          
                              <select class="form-control" id="etype" name="emp_type">
                  <option selected disabled value="0">...Select Employment Type</option>
                          <option value="Part-Time">Part-Time</option>
                          <option value="Full-Time">Full-Time</option>
                           <option value="Contract">Contract</option>
                         
                </select>
                          </div></div>
                        </div>
                        <br>
                        <div class="row">
        <div class ="col-md-4">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Company Name</span>
                            </div>
            <input type="text" id="place" class="form-control"
                  name="cmp_name">
      </div>
      </div> 
   
<br>
    
    <div class ="col-md-4">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Company Location</span>
                            </div>
                            <input type="text" class="form-control" name="cmp_loc">
                          </div></div>
        <div class ="col-md-4">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Current Job</span>
                            </div>
            <input type="checkbox" id="checkbox" class="form-control" name="c_job" value="checked">
      </div>
      </div> 
    </div>

    <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Start Date</span>
                            </div>
                            <input type="text" class="form-control date" name="estart">
                          </div></div>
        <div class ="col-md-6" id="uend">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;End Date</span>
                            </div>
            <input type="text" id="not" class="form-control date" name="exend">
      </div>
      </div> 
    </div>

    </div>
 
              <input type="hidden" name="created_by_id ?? ''" value="{{Auth::user()->id}}">
            <div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary addNewexperianceButton" data-dismiss="modal">Save changes</button>
                              </div>
                            </div>
                          </div>
                    </div>
        </div>
    </div>
</div>
                               
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent


<script type="text/javascript">

    
   
    $(document).ready(function(){

      $( "#degree" ).autocomplete({
        source: function( request, response ) {
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
          // Fetch data
          $.ajax({
            url:"{{route('admin.educations.fetchdegree')}}",
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
            
          
          
           $('#degree').val(ui.item.label); 
      
           $('#degreen').val(ui.item.value); 

      return false;
        }
      });

    });

    </script>


<script>
    $(document).ready(function () {
    $("#uvaver").each(function () {

    var sac = $(this).val($(this).find('option[selected]').val());
   

    if(sac.val() != 'null'){
     
       if ( sac.val() == 'Work Experience')
    
      {
        $("#uvaexp").slideDown();
      }
      else
      {
       $("#uvaexp").slideUp();
      }
}


    });
})
 </script>

    <script>  
$(document).ready(function(){
    $('#uvaver').on('change', function() {
      if ( this.value == 'Work Experience')
      {
        $("#uvaexp").slideDown();
      
        
      }
      else
      {
        
        $("#uvaexp").slideUp();
      }
    });
});
</script>




<script>
  $("#checkbox").change(function() {
    if(this.checked) {
         $("#uend").slideUp();
    }
    else{
       $("#uend").slideDown();
    }
   

});

</script>
    @endsection