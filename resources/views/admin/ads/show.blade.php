@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('Ad') }} {{ trans(' Deials') }}
    </div>

    <div class="card-body">
      
               
        <table class="table">
             <tr>
                <td>category:</td>
                <td><strong>{{$ad->ad_cats->name ?? ''}}</strong></td>
            </tr>
             <tr>
                <td>Sub Category:</td>
                <td><strong>{{$ad->ad_scats->name ?? ''}}</strong></td>
            </tr>
            <tr>
                <td>Ad Title:</td>
                <td><strong>{{$ad->adti}}</strong></td>
            </tr>
            <tr>
                <td>Ad Description:</td>
                <td><strong>{{$ad->adtd}}</strong></td>
               
            </tr>
                <tr>
                <td>Quantity:</td>
                <td><strong>{{$ad->qty ?? ''}}</strong></td>
               
            </tr>
              <tr>
                <td>Ad Price:</td>
                <td><strong>{{$ad->ad_price ?? ''}}</strong></td>
               
            </tr>
            <tr>
                <td>Ad Type:</td>
                <td><strong>{{$ad->ad_type}}</strong></td>
            </tr>
            <tr>
                <td>Ad City:</td>
                <td><strong>{{$ad->ad_city }}</strong></td>
            </tr>
            <tr>
                 <td>Ad Pin code:</td>
                <td><strong>{{$ad->ad_pincode}}</strong></td>
            </tr>
            <tr>
                <td>ad Image:</td>
                <td><strong><img alt="ad Image" class="img-rounded" style="height:50px; width: 100px;" src="{{ URL::asset("/public/image/".$ad->ad_pic ?? '') }}"/></strong></td>
            </tr>
        </table>
   


    </div>
</div>
@endsection