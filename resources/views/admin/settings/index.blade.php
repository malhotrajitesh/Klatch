@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header"> <i class="fa-fw fas fa-home nav-icon" style="color:#000;"></i>
        {{ trans('Settings') }} {{ trans('global.list') }}
    </div>
    
@if(Session::has('success'))
  <script type="text/javascript">
     swal({
         title:'Success!',
         text:"{{Session::get('success')}}",
         timer:5000,
         type:'success'
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif
 @if(Session::has('fail'))
 <script type="text/javascript">
    swal({
        title:'Oops!',
        text:"{{Session::get('fail')}}",
        type:'error',
        timer:5000
    }).then((value) => {
      //location.reload();
    }).catch(swal.noop);
</script>
@endif

    <div class="card-body">
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="post" action="{{ route("admin.settings.store") }}"  class="form-horizontal" role="form">
                   @csrf

                    @if(count(config('setting_fields', [])) )

                        @foreach(config('setting_fields') as $section => $fields)
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <i class="{{ Arr::get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
                                    {{ $fields['title'] }}
                                </div>

                                <div class="panel-body">
                                    <p class="text-muted">{{ $fields['desc'] }}</p>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-7  col-md-offset-2">
                                            @foreach($fields['elements'] as $field)
                                                @include('admin.settings.fields.' . $field['type'] )
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end panel for {{ $fields['title'] }} -->
                        @endforeach

                    @endif

                    <div class="row m-b-md">
                        <div class="col-md-12">
                            <button class="btn-primary btn">
                                Save Settings
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>


    </div>
</div>
@endsection
