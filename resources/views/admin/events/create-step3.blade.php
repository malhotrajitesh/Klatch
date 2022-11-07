@extends('layouts.admin')
@section('content')
    <h1>Final - Step</h1>
    <hr>
    <h3>Review Events Details</h3>
    <form action="{{ route("admin.events.store") }}" method="post" >
          @csrf
        <table>
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
                <td> From Time:</td>
                <td><strong> 
        
                                 
                                    <span class="badge badge-info">{{$ivent->ev_time ?? '' }}</span>
                              </strong></td>
               <td> To Time:</td>
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

            <tr>
                <td>Web Link:</td>
                <td><strong>{{$ivent->weblink ?? ''}}</strong></td>
               
            </tr>

            <tr>
                <td>Contact:</td>
                <td><strong>{{$ivent->contact ?? ''}}</strong></td>
               
            </tr>
       
        
        </table>
          <input type="hidden"  value="3" class="form-control" id="jstep" name="ev_step"/>
           <input type="hidden"  value="{{$ivent->id  ?? ''}}" class="form-control" id="step" name="nid"/>
           <input type="hidden"  value="Pending" class="form-control" id="status" name="ev_status"/>
     
        <button type="submit" class="btn btn-primary" style="float: right;">Create Event</button>

    </form>

     <a style="margin-top:20px;" type="button" href="{{route('admin.events.create-step2',$ivent=$ivent->id)}}" class="btn btn-warning">Previous</a>
@endsection
@section('scripts')

<style>
table, th, td {
  
  border-bottom: 1px solid green;
}
table{
background-color: #1877f2;
color: white;
}
</style>
@endsection
