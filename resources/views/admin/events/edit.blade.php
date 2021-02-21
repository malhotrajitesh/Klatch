@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('Verify') }} {{ trans('Event') }}
    </div>

    <div class="card-body">
      

                <table width="50%"> 
             <tr>
                <td>Event Mode:</td>
                <td><strong>{{$ivent->ev_mode  ?? ''}}</strong></td>
            </tr>
             <tr>
                <td>Event Name:</td>
                <td><strong>{{$ivent->ev_title ?? ''}}</strong></td>
            </tr>
            <tr>
                <td>Event Duration:</td>
                <td><strong>{{$ivent->ev_dura ?? ''}}</strong></td>
            </tr>
                  <tr>
                <td>Event Start:</td>
                <td><strong>{{$ivent->ev_start ?? ''}}</strong></td>
                @if($ivent->ev_dura == "Multi Day")
                <td>Event End :</td>
                <td><strong>{{$ivent->ev_end ?? ''}}</strong></td>
                @endif
            </tr>
            <tr>
                <td> Event Time:</td>
                <td><strong> 
        
                                 
                                    <span class="badge badge-info">{{$ivent->ev_time ?? '' }}</span>
                              </strong></td>
                                <td><strong> 
        
                                 
                                    <span class="badge badge-info">{{$ivent->ev_endtime ?? '' }}</span>
                              </strong></td>
               
            </tr>
            @if($ivent->ev_mode == "Offline")
               <tr>
                <td>Event City:</td>
                <td><strong>{{$ivent->ev_city ?? ''}}</strong></td>
                <td>Event Venue:</td>
                <td><strong>{{$ivent->ev_venue ?? ''}}</strong></td>
            </tr>
            @else
                <tr>
                <td>Event Link :</td>
                <td><strong>{{$ivent->ev_link ?? ''}}</strong></td>
               
            </tr>
@endif
 <tr>
                <td>Organised By :</td>
                <td><strong>{{$ivent->ev_by ?? ''}}</strong></td>
               
            </tr>
              <tr>
                <td>Event Pic:</td>
                <td><img alt="event picture" style="max-height: 113px;  max-width: 113px;" src="{{ URL::asset("/public/image/uvaevent/".$ivent->ev_pic ?? '') }}"/></td>
               
            </tr>
       
        
        </table>
        &nbsp;
     
       <form action="{{ route("admin.events.evup", [$ivent=$ivent->id]) }}" method="POST" enctype="multipart/form-data">
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
            <select class="form-control" name="ev_status" required>
                <option value="Approve">Approve</option>
                <option  value="Reject"> Reject</option>
            </select>
        </div>
     </div>

           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
@section('scripts')

<style>
table, th, td {
  
  border-bottom: 1px solid green;


}
table{
background-color: #1877f2;
color: white;
outline: #4CAF50 solid 5px;
outline-style: double;
}
</style>
@endsection