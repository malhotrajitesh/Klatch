@extends('layouts.admin')
@section('content')


<div class="card">
  <div class="card-header">

    {{ trans('Follow') }} {{ trans('Master') }}
  </div>

  <div class="card-body">
    @include('partials._alert')
    <div class="table-responsive">
      <table class=" table table-bordered table-striped table-hover datatable datatable-follow">
        <thead>
          <tr>
            <th width="10">

            </th>
            <th>
              {{ trans('Sr. No.') }}
            </th>
        
            <th>Title</th>
            <th> Desc</th>
            <th>Tags</th>
          
            <th>
              {{ trans('Status') }}
            </th>
            <th>
              &nbsp;
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($follows as $key => $follow)
          <tr data-entry-id="{{ $follow->id }}">
            <td>

            </td>
            <td>
              {{ $follow->id ?? '' }}
            </td>
        
            <td><strong>{{$follow->so_title ?? ''}}</strong></td>

          

        
              <td>
              {{ $follow->so_desc ?? '' }}
            </td>
               <td>
                 <strong>Tag:</strong>
                @foreach($follow->tags as $tag)
                    <label class="label label-info">#{{ $tag->name }}</label>
                @endforeach
            
            </td>
             <td>
              {{ $follow->so_status ?? '' }}
            </td>
          
            <td>
       <a class="btn btn-xs btn-info" href="{{ route('admin.follows.verifyfollow', $follow=$follow->id) }}">
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
      url: "{{ route('admin.follows.massDestroy') }}",
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
    $('.datatable-follow:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
    });
  })

</script>
@endsection