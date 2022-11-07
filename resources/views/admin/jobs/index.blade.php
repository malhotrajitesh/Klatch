@extends('layouts.admin')
@section('content')
 @include('partials._user_job')


<div class="card">
  <div class="card-header">
      @can('ujob_create')
    <a class="btn btn-success" style="float: right" href="{{ route("admin.jobs.create-step1") }}">
      {{ trans('global.add') }} {{ trans('Job') }}
    </a>
    @endcan
    {{ trans('Post') }} {{ trans('Job') }}
  </div>

  <div class="card-body">
    @include('partials._alert')
    <div class="table-responsive">
      <table class=" table table-bordered table-striped table-hover datatable datatable-job">
        <thead>
          <tr>
            <th width="10">

            </th>
            <th>
              {{ trans('Sr. No.') }}
            </th>
            <th>
              {{ trans('category') }}
            </th>
               <th>
              {{ trans('Job Profile ') }}
            </th>
            <th>Job Title</th>
            <th>Skills Req.</th>
            <th>Qualification:</th>
         
            <th>
              {{ trans('Applicant ') }}
            </th>
            <th>
              {{ trans('Status') }}
            </th>
            <th>
              &nbsp;
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($jobs as $key => $job)
          <tr data-entry-id="{{ $job->id }}">
            <td>

            </td>
            <td>
              {{ $job->id ?? '' }}
            </td>
            <td>
             
              {{$job->jprofiles->jobcategry->name  ?? ''}}
            </td>
 <td>
             
              {{$job->jprofiles->name   ?? ''}}
            </td>

            <td><strong>{{$job->job_t ?? ''}}</strong></td>

            <td> @foreach($job->skills as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach </td>

            
            <td><strong> @foreach($job->degrees as $object)
              
             
              <span class="badge badge-info">{{ $object->name }}</span>
            @endforeach</strong></td>

 
              <td>
              {{ $job->jseeker ?? '' }}
            </td>

            <td>
              {{ $job->jstatus ?? '' }}
            </td>


            <td>
              <div class="row"> 
              @php
              $njob=$job->id ?? '';
              @endphp

              @if($job->jseeker != 0)
              
              <div class="col-sm-2"> 
              <a  href="{{ route('admin.applyjobs.applicantd', $job->id ?? '') }}">
               <i class="fa fa-address-book fa-2x" style="color: red;" aria-hidden="true" title="View Applicant"></i>
             </a>
           </div>
             @endif
              @if($job->jstatus == 'Approve')
              <div class="col-sm-2"> 
                       <a  href="{{ route('admin.jobs.closejob', compact('njob')) }}" onclick="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       <i class="fas fa-times-circle  fa-lg" style="color: red;" aria-hidden="true" title="Close Job"></i>
                                    </a>

</div>
                     @endif
             @if($job->jstatus == 'UNFINISHED')
             <div class="col-sm-2"> 
               <a  href="{{ route('admin.jobs.pendjob', compact('njob')) }}">
               <i class="fa fa-pencil-square-o fa-lg" style="color: blue;" aria-hidden="true" title="Complete Job"></i>
             </a>
           </div>
<div class="col-sm-2"> 
               <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit">
    <i class="fas fa-trash-alt fa-lg" style="color: red;" title="Delete Job"></i> 
</button>

</form>
</div>

             @endif
</div>

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
<script>
  $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('income_category_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
      text: deleteButtonTrans,
      url: "{{ route('admin.jobs.massDestroy') }}",
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
            headers: {'x-csrf-token': _token},
            method: 'POST',
            url: config.url,
            data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
        }
      }
    }
    dtButtons.push(deleteButton)
    @endcan

    $.extend(true, $.fn.dataTable.defaults, {
      order: [[ 1, 'desc' ]],
      pageLength: 100,
    });
    $('.datatable-job:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
    });
  })

</script>
@endsection