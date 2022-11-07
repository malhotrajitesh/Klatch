@extends('layouts.admin')
@section('content')
 @include('partials._my_event')

<div class="card">
  <div class="card-header">
      @can('episode_create')
    <a class="btn btn-success" style="float: right" href="{{ route("admin.events.create-step1") }}">
      {{ trans('global.add') }} {{ trans('ivent') }}
    </a>
    @endcan
    {{ trans('Posted') }} {{ trans('Events') }}
  </div>
   @include('partials._alert')

  <div class="card-body">
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
              {{ trans('Web Link') }}
            </th>
            <th>
              {{ trans('Contact') }}
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
              {{ $ivent->weblink ?? '' }}
            </td>
            <td>
              {{ $ivent->contact ?? '' }}
            </td>
          
            <td>
              <div class="row"> 
              @php
              $nivent=$ivent->id ?? '';
              @endphp

               @if($ivent->ev_interest != 0)
              
              <div class="col-sm-2"> 
              <a  href="{{ route('admin.applyevents.viewlist', $ivent->id ?? '') }}">
               <i class="fa fa-address-book fa-2x" style="color: red;" aria-hidden="true" title="Interested Persons"></i>
             </a>
           </div>
             @endif

         
              @if($ivent->jstatus == 'Approve')
              <div class="col-sm-2"> 
                       <a  href="{{ route('admin.events.closeevent', compact('nivent')) }}" onclick="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       <i class="fas fa-times-circle  fa-lg" style="color: red;" aria-hidden="true" title="Close ivent"></i>
                                    </a>

</div>
                     @endif


             @if($ivent->ev_status == 'UNFINISHED')
             <div class="col-sm-2"> 
               <a  href="{{ route('admin.events.pendevent', compact('nivent')) }}">
               <i class="fa fa-pencil-square-o fa-lg" style="color: blue;" aria-hidden="true" title="Complete ivent"></i>
             </a>
           </div>
<div class="col-sm-2"> 
               <form action="{{ route('admin.events.destroy', $ivent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit">
    <i class="fas fa-trash-alt fa-lg" style="color: red;" title="Delete ivent"></i> 
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