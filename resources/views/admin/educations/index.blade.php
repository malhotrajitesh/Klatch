@extends('layouts.admin')
@section('content')
@can('uedu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.educations.create") }}">
                {{ trans('global.add') }} {{ trans('Education') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('Education') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-education">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.incomeCategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('College') }}
                        </th>
                          <th>
                            {{ trans('Degree Name') }}
                        </th>
                           <th>
                            {{ trans('Field Of Study') }}
                        </th>
                           <th>
                            {{ trans('Location') }}
                        </th>
                         
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($educations as $key => $education)
                        <tr data-entry-id="{{ $education->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $education->id ?? '' }}
                            </td>
                               <td>
                                {{ $education->college ?? '' }}
                            </td>
                              <td>
                                {{ $education->degree_name ?? '' }}
                            </td>
                            <td>
                                {{ $education->fos ?? '' }}
                            </td>
                              <td>
                                {{ $education->uplace ?? '' }}
                            </td>
                            <td>
                                @can('uedu_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.educations.show', $education->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('uedu_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.educations.edit', $education->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('uedu_delete')
                                    <form action="{{ route('admin.educations.destroy', $education->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.educations.massDestroy') }}",
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
  $('.datatable-education:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection