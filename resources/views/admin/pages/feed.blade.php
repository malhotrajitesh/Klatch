@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('Feedbacks') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-feedback">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('Id') }}
                        </th>
                        <th>
                            {{ trans('Name') }}
                        </th>
                          <th>
                            {{ trans('Email') }}
                        </th>
                         <th>
                            {{ trans('Mobile') }}
                        </th>
                          <th>
                            {{ trans('Type') }}
                        </th>
                          <th>
                            {{ trans('Subject') }}
                        </th>
                    <th>
                            {{ trans('Description') }}
                        </th>
                          <th>
                            {{ trans('By') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $key => $feedback)
                        <tr data-entry-id="{{ $feedback->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $feedback->id ?? '' }}
                            </td>
                            <td>
                                {{ $feedback->feed_name ?? '' }}
                            </td>
                             <td>
                              {{ $feedback->feed_email ?? '' }}
                            
                            </td>
                               <td>
                              {{ $feedback->feed_mobile ?? '' }}
                            
                            </td>
                               <td>
                              {{ $feedback->feed_type ?? '' }}
                            
                            </td>
                                <td>
                              {{ $feedback->feed_subject ?? '' }}
                            
                            </td>
                              
                            <td>
                              {{ substr($feedback->feed_desc,0,100) }} <br><a href='#'>Read More...</a>
                            
                            </td>
                            <td>
                              {{ $feedback->created_by->name ?? '' }}
                            
                            </td>
                              <td>
                              
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
@can('feedback_delete')
  let deleteButtonTrans = '{{ trans('Active') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('#') }}",
    className: '',
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
    feedbackLength: 100,
  });
  $('.datatable-feedback:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection