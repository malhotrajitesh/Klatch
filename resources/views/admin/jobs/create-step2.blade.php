@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-hejober">
       {{ trans('job  Details') }} {{ trans('Step 2') }}
    </div>

    <div class="card-body">
    <form action="{{ route('admin.jobs.postCreateStep2') }}" method="post">
      @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{ old('job_t', isset($job) ? $job->job_t : '') }}" class="form-control" id="taskTitle"  name="job_t">
        </div>
           <div class="form-group">
            <label for="description">  Description</label>
         
              <textarea type="text"  class="form-control" rows="1" id="taskDescription" name="job_dsc">{{ $job->job_dsc ?? '' }}</textarea>
        </div>

    
 <div class="row">
            <div class ="col-sm-6">

            <div class="form-group">
            	  <label>Skills *
      <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span>
                  </label>
            <select name="skills[]" id="skills" class="form-control select2" multiple="multiple" required>
                @foreach($skills as $id => $skills)
                <option value="{{ $id }}" {{ (in_array($id, old('skills', [])) || isset($job) && $job->skills->contains($id)) ? 'selected' : '' }}>{{ $skills }}</option>
                @endforeach
            </select>
       
        </div>
    </div>


          <div class="col-sm-6">
    <label>Qualification *
      <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span>
                  </label>
            <select name="degrees[]" id="degrees" class="form-control select2" multiple="multiple" required>
                @foreach($degrees as $id => $degrees)
                <option value="{{ $id }}" {{ (in_array($id, old('degrees', [])) || isset($job) && $job->degrees->contains($id)) ? 'selected' : '' }}>{{ $degrees }}</option>
                @endforeach
            </select>
   
</div>
</div>

        <div class="row">
            <div class ="col-sm-3">
              <div class="form-group">
             
            <label for="min-salary">Select Salary (in Lacs)</label>
            <div class="number-input">
  <button type="button" onclick="this.parentNode.querySelector('#uvan2').stepDown()" ></button>
  <input class="form-control" id="uvan2" min="1" name="jminsal" value="{{ $job->jminsal ?? '1' }}" type="number">
  <button type="button" onclick="this.parentNode.querySelector('#uvan2').stepUp()" class="plus"></button> 
</div>
          
        </div>
         </div>
         <div class ="col-sm-3">
      <div class="form-group">
        <label>Select Experience</label>
        <select type="text" class="form-control" id="experience" name="jminexp" required>
            <option value="">--Please Select--</option>
            <option {{ (isset($job->jminexp) && $job->jminexp == '0 year') ? "selected=\"selected\"" : "" }}>0 year</option>
            <option {{ (isset($job->jminexp) && $job->jminexp == '1 year') ? "selected=\"selected\"" : "" }}>1 year</option>
                <option {{ (isset($job->jminexp) && $job->jminexp == '2 year') ? "selected=\"selected\"" : "" }}>2 year</option>
                <option {{ (isset($job->jminexp) && $job->jminexp == '3 year') ? "selected=\"selected\"" : "" }}>3 year</option>
                <option {{ (isset($job->jminexp) && $job->jminexp == '4 year') ? "selected=\"selected\"" : "" }}>4 year</option>
                <option {{ (isset($job->jminexp) && $job->jminexp == '5 year') ? "selected=\"selected\"" : "" }}>5 year</option>
       
        </select>
    </div>
        </div>

<div class ="col-sm-3"> 
     <div class="form-group">
            <label for="gender">Job Type</label>
            <select type="text" class="form-control" id="type" name="jtype" required>
                <option value="">--Please Select--</option>
                <option {{ (isset($job->jtype) && $job->jtype == 'Part Time') ? "selected=\"selected\"" : "" }}>Part Time</option>
                <option {{ (isset($job->jtype) && $job->jtype == 'Full Time') ? "selected=\"selected\"" : "" }}>Full Time</option>
                <option {{ (isset($job->jtype) && $job->jtype == 'Permanent') ? "selected=\"selected\"" : "" }}>Permanent</option>
                <option {{ (isset($job->jtype) && $job->jtype == 'Contractual') ? "selected=\"selected\"" : "" }}>Contractual</option>
            </select>
        </div>
    
</div>

<div class ="col-sm-3"> 
    <div class="form-group">
        <label>No. Of Vacancy</label>
         <div class="number-input">
  <button type="button" onclick="this.parentNode.querySelector('#uvan1').stepDown()" ></button>
  <input class="form-control" min="1" id="uvan1" name="jvacancy" value="{{ $job->jvacancy ?? '1' }}" type="number" required>
  <button type="button" onclick="this.parentNode.querySelector('#uvan1').stepUp()" class="plus"></button> 
</div>
        
    </div>
</div>

</div>

  <div class="row">
        

       

 <div class="checkbox">
    <label>
    <input type="checkbox"  id="chat" name="jchat" value="1">
   &nbsp; Allow Applicant to Chat with you ?</label>
    
</div>



</div>


        <input type="hidden"  value="{{ $job->id ?? '' }}" class="form-control" id="nid" name="job_id"/>
          <input type="hidden"  value="2" class="form-control" id="step" name="jstep"/>
           <input type="hidden"  value="UNFINISHED" class="form-control" id="status" name="jstatus"/>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         <br>
        <button type="submit" style="float: right;" class="btn btn-primary"> Next</button>
    </form>
    @php
     $job = $job->id ?? '' ;
    @endphp
     <a style="margin-top:20px;" class="btn btn-danger" href="{{route('admin.jobs.create-step1',compact('job'))}}">
                {{ trans('Previous') }}
            </a>
</div>
</div>

@endsection
<style>
    input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.number-input {
  border: 0;
  display: inline-flex;
}

.number-input,
.number-input * {
  box-sizing: border-box;
}

.number-input button {
  outline:none;
  -webkit-appearance: none;
  background-color: transparent;
  border: none;
  align-items: center;
  justify-content: center;
  width: 3rem;
  height: 3rem;
  cursor: pointer;
  margin: 0;
  position: relative;
  box-shadow: 0px 0px 1px #474747;
    border-radius: 50%;
}

.number-input button:before,
.number-input button:after {
  display: inline-block;
  position: absolute;
  content: '';
  width: 1rem;
  height: 2px;
  background-color: #212121;
  transform: translate(-50%, -50%);
}
.number-input button.plus:after {
  transform: translate(-50%, -50%) rotate(90deg);
}

.number-input input[type=number] {
  font-family: sans-serif;
  max-width: 5rem;
  padding: .5rem;
  border: none;
  border-width: 0 2px;
  font-size: 2rem;
  height: 3rem;
  font-weight: bold;
  text-align: center;
  color:#9be3df;
}
</style>