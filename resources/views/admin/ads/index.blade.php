@extends('layouts.admin')
@section('content')
@include('partials._user_ad')
     <div class="card-header">
        {{ trans('Posted Ad') }} {{ trans('global.list') }}
          <a class="btn btn-success" style="float: right;" href="{{ route("admin.ads.create-step1") }}">
                {{ trans('global.add') }} {{ trans('Ad') }}
            </a>
    </div>
   @include('partials._alert')
    <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-party">
   
        <thead class="thead" style="background-color: #fff; color: #282828;">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ad Title</th>
            <th scope="col">Ad Description</th>
            <th scope="col">Type</th>
            <th scope="col">City</th>
            <th scope="col">Pincode</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>

            
        </tr>
        </thead>
        <tbody>
        @foreach($ads as $ad)
            <tr>
                <th scope="row">{{$ad->id}}</th>
                <td>{{$ad->adti}}</a></td>
                <td>{{$ad->adtd}}</td>
                <td>{{$ad->ad_type}}</td>
                <td>{{$ad->ad_city}}</td>
                <td>{{$ad->ad_pincode}}</td>
                <td> <img alt="ad Image" class="img-rounded" style="height:35px; width: 40px;" src="{{ URL::asset("/public/image/".$ad->ad_pic ?? '') }}"/> </td>
                 <td>{{$ad->ad_status}}</td>
                 <td>
                   @php
                  $nad=$ad->id ?? '';
                  @endphp
                     @if($ad->ad_status == 'Approve')
                       <a  href="{{ route('admin.ads.soldad', compact('nad')) }}" onclick="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       <i class="fas fa-rupee-sign  fa-lg" style="color: #2ab7ca;" aria-hidden="true" title="Sold Ad"></i>
                                    </a>

                     @endif

                       @if($ad->ad_status == 'Approve')
                        <form action="{{ route('admin.ads.adact')}}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                   
                                         <input type="hidden" name="astatus" value="Disable">
                                         <input type="hidden" name="aid" value="{{$ad->id ?? ''}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit">
    <i class="fas fa-ban fa-lg" style="color: #C70039;" title="Disable"></i> 


</button>

                    

                      @endif

                               @if($ad->ad_status == 'Disable')
                        <form action="{{ route('admin.ads.adact')}}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                   
                                         <input type="hidden" name="astatus" value="Approve">
                                         <input type="hidden" name="aid" value="{{$ad->id ?? ''}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit">
    <i class="fas fa-toggle-on" style="color: #C70039;" title="Enable"></i> 
  


</button>

                    

                      @endif

                    @if($ad->ad_status == 'UNFINISHED')
                 
                 
                      <a  href="{{ route('admin.ads.pendad', compact('nad')) }}">
                                       <i class="fa fa-pencil-square-o fa-lg" style="color: blue;" aria-hidden="true" title="Complete Ad"></i>
                                    </a>
                                      <form action="{{ route('admin.ads.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit">
    <i class="fas fa-trash-alt fa-lg" style="color: #C70039;" title="Delete Ad"></i> 
</button>
                                      
                                 
                                    @endif
                 </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection