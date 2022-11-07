@extends('layouts.admin')
@section('content')
@can('city_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.citys.create") }}">
                {{ trans('global.add') }} {{ trans('New City') }}
            </a>
    
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('Citys') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-page">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('Id') }}
                        </th>
                        <th>
                            {{ trans('City Name') }}
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
                    @foreach($citys as $key => $city)
                        <tr data-entry-id="{{ $city->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $city->id ?? '' }}
                            </td>
                            <td>
                                {{ $city->city_name ?? '' }}
                            </td>
                       
                           
                              <td>
                                @if($city->deletd_at)
                                Disabled
                                @else 
                                Active
                                @endif
                            </td>
                  
                            <td>
                    

                                @can('city_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.citys.edit', $city->id) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('city_delete')
                                    <form action="{{ route('admin.citys.destroy', $city->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('Disabled') }}">
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
@can('city_delete')
  let deleteButtonTrans = '{{ trans('Active') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.citys.massDestroy') }}",
    className: 'btn btn-xs btn-info',
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
  $('.datatable-page:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection