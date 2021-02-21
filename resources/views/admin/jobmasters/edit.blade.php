@extends('layouts.admin')
@section('content')

       
 

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('Job Details') }}
    </div>

    
        <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        @if($job->cmp_id !='NULL')
                            <img class="p-0 logo rounded-circle"  style="width:128px; height: 128px; "src="{{ URL::asset("/public/image/clogo/".$job->company->logo ?? '') }}" data-holder-rendered="true" />
                           
                    </div>
                    <div class="col">
                     <h2 class="name"><a href="#"> <strong>{{$job->job_t ?? ''}} </strong> </a></h2>
                     <h5> Posted: {{$job->created_at->diffForHumans()}}  </h5>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a href="#">
                            {{$job->company->cmname ?? ''}}
                            </a>
                        </h2>
                        <div>{{$job->company->contact_no ?? ''}}</div>
                        <div>{{$job->company->email ?? ''}}</div>
                        <div>{{$job->company->cpname ?? ''}}</div>
                    </div>
                </div>
            </header>

            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <h1 class="invoice-id">Locations:</h1>
                        <h4 class="to">  @foreach($job->cbranchs as $object)
        
                                 
                                    <span class="badge badge-info">{{ $object->name }}</span>
                                @endforeach </h4>
                        <div class="address">Category</div>
                        <h4><a href="#">{{$job->job_cats->name  ?? ''}}</a></h4>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Skills:</h1>
                        <h4>@foreach($job->skills as $object)
        
                                 
                                    <span class="badge badge-info">{{ $object->name }}</span>
                                @endforeach </strong></h4>
                        <div class="date">Qualification :</div>
                        <h4> @foreach($job->degrees as $object)
        
                                 
                                    <span class="badge badge-info">{{ $object->name }}</span>
                                @endforeach </h4>
                    </div>
                </div>

 <table border="0" cellspacing="0" cellpadding="1em">
                    <thead style="color: #fff;
    font-size: 1.6em;
    background: #3989c6;">
                        <tr>
                            <th>Job Type</th>
                            <th>Min Exp</th>
                            <th>Max Exp</th>
                            <th>Min Salary</th>
                            <th>Max Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td><strong>{{$job->jtype ?? ''}}</strong></td>
                          <td><strong>{{$job->jminexp ?? ''}}</strong></td>
                          <td><strong>{{$job->jmaxexp ?? ''}}</strong></td>
                           <td><strong>{{$job->jminsal ?? ''}}</strong></td>
                           <td><strong>{{$job->jmaxsal ?? ''}}</strong></td>
                              </tr>
                    </tbody>
                     <tfoot>
                      <tr>
                        <td colspan="5"><strong>{{$job->job_dsc ?? ''}}</strong></td>
                      </tr>
                     </tfoot>
                  </table>

      
          
    
           
            <a style="margin-top:20px;" class="btn btn-danger" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">


            </div>
        </nav>
        <div class="tab-content">
              <form action="{{ route("admin.jobs.update", [$job->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                <label for="due_date">{{ trans('Expire Days') }}*</label>
                <input type="text" id="exp_date" name="exp_date" class="form-control" placeholder="Days" value="15" required>
         
              </div>
            </div>
             <div class="col-sm-4">
             <div class="form-group">
            <label for="description">Perimssion</label>
            <select class="form-control" name="jstatus" required>
                <option value="Approve">Approve</option>
                <option  value="Reject"> Reject</option>
            </select>
        </div>
     </div>

     
           <div class="col-sm-4">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>
        </form>

        </div>
    </div>
</div>
 
          
@endsection

       


@section('scripts')
@parent

<style>
  
  #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
  padding: 15px;
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
    border-bottom: 1px solid #fff
}





</style>
@endsection