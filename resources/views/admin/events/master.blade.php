@extends('layouts.admin')
@section('content')


<div class="card">
  <div class="card-header">
 
    {{ trans('Event') }} {{ trans('Master') }}
  </div>



  <div class="card-body">
@include('partials._alert')
    <div class="table-responsive">
      <table class=" table table-bordered table-striped table-hover datatable datatable-ivent">
        <thead>
          <tr>
            <th width="10">

            </th>
            <th>
              {{ trans('Sr. No.') }}
            </th>
            <th>
              {{ trans('Event Mode') }}
            </th>
            <th>Event Title</th>
            <th>Event Days</th>
            <th>Time</th>
            <th>
              {{ trans('Event Start') }}
            </th>
            <th>
              {{ trans('Event End') }}
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
          @foreach($ivents as $key => $ivent)
          <tr data-entry-id="{{ $ivent->id }}">
            <td>

            </td>
            <td>
              {{ $ivent->id ?? '' }}
            </td>
            <td>
             
              {{$ivent->ev_mode ?? ''}}
            </td>
            <td><strong>{{$ivent->ev_title ?? ''}}</strong></td>

          

        
              <td>
              {{ $ivent->ev_dura ?? '' }}
            </td>
               <td>
              {{ $ivent->ev_time ?? '' }}
            </td>

            <td>
              {{ $ivent->ev_start ?? '' }}
            </td>

            <td>
              {{ $ivent->ev_end ?? '' }}
            </td>
             <td>
              {{ $ivent->ev_status ?? '' }}
            </td>
          
            <td>


                                    <a class="btn btn-xs btn-info" href="{{ route('admin.events.verifymaster', $ivent=$ivent->id) }}">
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
<script>
  $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
      text: deleteButtonTrans,
      url: "{{ route('admin.events.massDestroy') }}",
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
   

    $.extend(true, $.fn.dataTable.defaults, {
      order: [[ 1, 'desc' ]],
      pageLength: 100,
    });
    $('.datatable-ivent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
    });
  })

</script>
@endsection