@extends('layouts.admin')
@section('content')
@include('partials._admin_job')
<div class="card">
    <div class="card-hejober">
        {{ trans('Job Master') }} {{ trans('global.list') }}
    </div>


    <div class="card-body">
      @include('partials._alert')
        <div class="table-responsive">
            <table id ="datac" class=" table table-bordered table-striped table-hover datatable datatable-job">
                <thead>
                    <tr>
                       
                      <th>
                      </th>
                         <th>
                            {{ trans('Title') }}
                        </th>
                        
                        <th>
                            {{ trans('Company') }}
                        </th>
                          <th>
                            {{ trans('Job Location') }}
                        </th>
                    
                         
                      <!--      <th>
                            {{ trans('Max sal') }}
                        </th> -->
                         <th>
                            {{ trans('Min exp') }}
                        </th>
                      
                          
                         <th>
                            {{ trans('Status') }}
                        </th>
                        
                          <th>
                            {{ trans('Posted By') }}
                        </th>
                            <th>
                            {{ trans('Posted at') }}
                        </th>
                            

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $key => $job)
                        <tr data-entry-id="{{ $job->id }}">
                        <td > </td>
                        <td> {{$job->job_t ?? ''}}</td>
                       
                        <td> {{$job->jprofiles->name  ?? ''}}</td>
                         <td>@foreach($job->cbranchs as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach</td>
            
           <!-- <td> {{$job->jmaxsal ?? ''}}</td>-->
            <td> {{$job->jminexp ?? ''}}</td>
                     
                               
                          

                             <td>{{$job->jstatus ?? ''}} </td>
                               <td> {{$job->created_by->name  ?? ''}}</td>
                              

                              <td>{{$job->created_at->diffForHumans()}}</td>
                              
                            
            

                 

                      
                            
                            <td>


                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jobs.edit', $job->id) }}">
                                        {{ trans('Verify') }}
                                    </a>
                            

                              
                       
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<style>
table{
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#1a7707 !important; 
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse !important; ;
}
table th {
	padding: 0px;
	background: #d5e3e4;
	
	background: -moz-linear-gradient(top,  #d5e3e4 0%, #ccdee0 40%, #b3c8cc 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d5e3e4), color-stop(40%,#ccdee0), color-stop(100%,#b3c8cc));
	background: -webkit-linear-gradient(top,  #d5e3e4 0%,#ccdee0 40%,#b3c8cc 100%);
	background: -o-linear-gradient(top,  #d5e3e4 0%,#ccdee0 40%,#b3c8cc 100%);
	background: -ms-linear-gradient(top,  #d5e3e4 0%,#ccdee0 40%,#b3c8cc 100%);
	background: linear-gradient(to bottom,  #d5e3e4 0%,#ccdee0 40%,#b3c8cc 100%);
	border: 1px solid #999999;
}
table td {
	padding: 0px;
	padding-top: 0px !important;
	padding-bottom: 0px !important;
	background: #ebecda;
	
	background: -moz-linear-gradient(top,  #ebecda 0%, #e0e0c6 40%, #ceceb7 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ebecda), color-stop(40%,#e0e0c6), color-stop(100%,#ceceb7));
	background: -webkit-linear-gradient(top,  #ebecda 0%,#e0e0c6 40%,#ceceb7 100%);
	background: -o-linear-gradient(top,  #ebecda 0%,#e0e0c6 40%,#ceceb7 100%);
	background: -ms-linear-gradient(top,  #ebecda 0%,#e0e0c6 40%,#ceceb7 100%);
	background: linear-gradient(to bottom,  #ebecda 0%,#e0e0c6 40%,#ceceb7 100%);
	border: 1px solid #999999;
}

</style>
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "#",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          hejobers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.relojob() })
      }
    }
  }
  dtButtons.push(deleteButton)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-job:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.jobjust();
    });
})

</script>
@endsection