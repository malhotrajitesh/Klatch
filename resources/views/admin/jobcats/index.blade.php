@extends('layouts.admin')
@section('content')
@include('partials._admin_job')
<div class="card">
    <div class="card-header">
        {{ trans('Job Category') }} {{ trans('Master') }}
        @can('a_category_create')
  
            <a class="btn btn-success" style="float: right;" href="{{ route("admin.jobcats.create") }}">
                {{ trans('global.add') }} {{ trans('Job Category') }}
            </a>
  
@endcan
    </div>
 @include('partials._alert')
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-jobcat">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.incomeCategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('Name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobcats as $key => $jobcat)
                        <tr data-entry-id="{{ $jobcat->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jobcat->id ?? '' }}
                            </td>
                            <td>
                                {{ $jobcat->name ?? '' }}
                            </td>
                            <td>
                                @can('income_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jobcats.show', $jobcat->id) }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>  
                                    </a>
                                @endcan

                                @can('income_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jobcats.edit', $jobcat->id) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('income_category_delete')
                                    <form action="{{ route('admin.jobcats.destroy', $jobcat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
    url: "{{ route('admin.jobcats.massDestroy') }}",
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
  $('.datatable-jobcat:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection