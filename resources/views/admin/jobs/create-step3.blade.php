@extends('layouts.admin')
@section('content')
    <h1>Final - Step</h1>
    <hr>
    <h3>Review Job Details</h3>
    <form action="{{ route("admin.jobs.store") }}" method="post" >
          @csrf
        <table class="table">
             <tr>
                <td>category:</td>
                <td><strong>{{$job->job_cats->name  ?? ''}}</strong></td>
            </tr>
             <tr>
                <td>Entity:</td>
                <td><strong>{{$job->entitys->name ?? ''}}</strong></td>
            </tr>
            <tr>
                <td>Company:</td>
                <td><strong>{{$job->company->cmname ?? ''}}</strong></td>
            </tr>
            <tr>
                <td> Job Locations:</td>
                <td><strong>   @foreach($job->cbranchs as $object)
        
                                 
                                    <span class="badge badge-info">{{ $object->name }}</span>
                                @endforeach </strong></td>
               
            </tr>
                <tr>
                <td>Job Title:</td>
                <td><strong>{{$job->job_t ?? ''}}</strong></td>
               
            </tr>
              <tr>
                <td>Job Desc:</td>
                <td><strong>{{$job->job_dsc ?? ''}}</strong></td>
               
            </tr>
            <tr>
                <td>Skills:</td>
                <td><strong> @foreach($job->skills as $object)
        
                                 
                                    <span class="badge badge-info">{{ $object->name }}</span>
                                @endforeach </strong></td>
            </tr>
            <tr>
                <td>Salary:</td>
                <td><strong>{{$job->jminsal ?? ''}} Lacs</strong></td>
               
            </tr>
                <tr>
                <td>Exp:</td>
                <td><strong>{{$job->jminexp ?? ''}}</strong></td>
             
            </tr>
            <tr>
             <td>Vacancy:</td>
                <td><strong>{{$job->jvacancy ?? ''}}</strong></td>
            </tr>
                 <tr>
                   <td>Wanted Chat</td>
                <td><strong>{{$job->jchat ?? ''}}</strong></td>
            </tr>

              <tr>
                <td>Qualification:</td>
                <td><strong> @foreach($job->degrees as $object)
        
                                 
                                    <span class="badge badge-info">{{ $object->name }}</span>
                                @endforeach</strong></td>
            </tr>

   <tr>
                <td>Job Type:</td>
                <td><strong>{{$job->jtype ?? ''}}</strong></td>
            </tr>
        
        </table>
          <input type="hidden"  value="3" class="form-control" id="jstep" name="jstep"/>
           <input type="hidden"  value="{{$job->id  ?? ''}}" class="form-control" id="step" name="nid"/>
           <input type="hidden"  value="Pending" class="form-control" id="status" name="jstatus"/>
     
        <button type="submit" class="btn btn-primary">Create Job</button>

    </form>

     <a style="margin-top:20px;" type="button" href="{{route('admin.jobs.create-step2',$job=$job->id)}}" class="btn btn-warning">Previous</a>
@endsection