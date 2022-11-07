@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('Event Details') }}
    </div>

    <div class="card-body">

        <div class="invoice overflow-auto">
        <div>
            <header>
                <div class="row" style="background: linear-gradient(to top left, #33ccff 50%, #003300 100%)">

                    <div class="container">
<div class="img-1">
    <img style="width: 240px; height: 320px;" src="{{ URL::asset("/public/image/uvaevent/".$applyevent->ev_pic ?? '') }}" />
</div>
<div class="img-2">
    <img style="width: 240px; height: 320px;" src="{{ URL::asset("/public/image/uvaevent/".$applyevent->ev_pic ?? '') }}" />
</div>
</div>
                   
                        
                          
                           
                    
                </div>
                    <div class="row">

                    <div class="col">
                     <h2 class="name"><a href="#"> <strong>{{$applyevent->ev_title ?? ''}} </strong> </a></h2>
                   
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a href="#">
                            {{$applyevent->ev_mode ?? ''}}
                            </a>
                        </h2>
                        <div>{{$applyevent->ev_dura ?? ''}}</div>
                        <div>{{$applyevent->ev_start ?? ''}}</div>
                        <div>{{$applyevent->ev_end ?? ''}}</div>
                    </div>
                </div>
            </header>

            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <h1 class="invoice-id">City:</h1>
                        <h4 class="to">  {{$applyevent->ev_city ?? ''}}</h4>

                        <div class="address">Venue</div>
                        <h4><a href="#">{{$applyevent->ev_venue ?? ''}}</a></h4>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Link:</h1>
                        <h4>{{$applyevent->ev_link ?? ''}}</strong></h4>
                        <div class="date">Time : <i class="fa fa-clock-o" style="color: red;" aria-hidden="true"></i>
</div>
                        <h4> {{$applyevent->ev_time ?? '' }} </h4>
                    </div>
                </div>

 <table border="0" cellspacing="0" cellpadding="1em">
                    <thead style="color: #fff;
    font-size: 1.6em;
    background: #3989c6;">
                        <tr>
                            <th>Interested</th>
                            <th>Saved</th>
                            <th>Views</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td><strong>{{$applyevent->ev_interest ?? ''}}</strong></td>
                          <td><strong>{{$applyevent->ev_save ?? ''}}</strong></td>
                          <td><strong>{{$applyevent->ev_view ?? ''}}</strong></td>
                       
                              </tr>
                    </tbody>
                     <tfoot>
                      <tr>
                        <td colspan="5"><strong>{{$applyevent->ev_about ?? ''}}</strong></td>
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

<style>

    .container {
    width: 620px;
    
}
.img-1 {
    position: relative;
    display: inline-block;
    -webkit-perspective: 1000px;
    -moz-perspective: 1000px;
    perspective: 1000px;
    margin-top: 50px;
    margin: 20px;
}
.img-1 img {
    transform: rotateY(-30deg);
}
.img-1:before {
    content: "";
    position: absolute;
    width: 260px;
    height: 100%;
    background-color: black;
    transform: rotateY(-30deg) translateZ(-30px);
    border-radius: 15px;
}
.img-2 {
    position: relative;
    display: inline-block;
    -webkit-perspective: 1000px;
    -moz-perspective: 1000px;
    persepctive: 1000px;
    margin: 20px;
    margin-top: 50px;
}
.img-2 img {
    transform: rotateY(40deg);
}
.img-2:before {
    content: "";
    top: -15px;
    position: absolute;
    width: 19%;
    height: 105.6%;
    background-color: black;
    transform: translateX(-16px) translateY(2.7px) rotateY(-55deg)
}
  
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
    font-size: 16px;
    border-bottom: 1px solid #fff
}





</style>
@endsection