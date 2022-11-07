@extends('layouts.admin')
@section('content')
@include('emails.template_header')

 <div class="row">
    <div class="col-lg-12" style="margin:65px 0px;">
    <h5 class="text-center" style="font-size:20px;font-weight:600;">{{ $datas['subject'] }}</h5>
  </div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
      <p style="font-size:20px;margin:11px 0;">{{ $datas['msg'] }} </p>

  <br><br>


  
<p style="font-size:20px;margin:11px 0;">Sincerely, </p>
<p style="font-size:20px;margin:11px 0;">Customer Support Services</p>

  </div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')
@endsection