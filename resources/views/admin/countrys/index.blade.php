@extends('layouts.admin')
@section('content')
@can('cntry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.countrys.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.country.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('Country') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-country">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('Id') }}
                        </th>
                        <th>
                            {{ trans('code') }}
                        </th>
                          <th>
                            {{ trans('Name') }}
                        </th>
                            <th>
                            {{ trans('Phone Code') }}
                        </th>
                         <th>
                            {{ trans('Flag') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countrys as $key => $country)
                        <tr data-entry-id="{{ $country->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $country->id ?? '' }}
                            </td>
                            <td>
                                {{ $country->iso ?? '' }}
                            </td>
                              <td>
                                {{ $country->name ?? '' }}
                            </td>
                              <td>
                                {{ $country->phonecode ?? '' }}
                            </td>
                            <td>
                               <img class="form control" style="width:50px; height: 40px; " src="{{ URL::asset("/public/image/flags/".strtolower($country->iso ?? '')) }}.png">  
                            </td>
                            <td>
                              <!--
                                @can('cntry_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.countrys.show', $country->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cntry_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.countrys.edit', $country->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                              -->
                                  @if($country->deleted_at != '')
                                @can('cntry_delete')
                                    <form action="{{ route('admin.countrys.massrestore', $country->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-success" value="{{ trans('Enable') }}">
                                    </form>
                                @endcan
                                @endif
                               @if($country->deleted_at == '')
                                @can('cntry_delete')
                                    <form action="{{ route('admin.countrys.destroy', $country->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('Disable') }}">
                                    </form>
                                @endcan
                                @endif
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
@can('cntry_delete')
  let deleteButtonTrans = '{{ trans('Disable Selected') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.countrys.massDestroy') }}",
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
  $('.datatable-country:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>

@endsection