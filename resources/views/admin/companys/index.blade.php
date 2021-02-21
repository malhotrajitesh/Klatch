@extends('layouts.admin')
@section('content')
@include('partials._admin_job')

<div class="card">
    <div class="card-header"><i class="fa-fw fas fa-tasks nav-icon" style="color:#000;"></i>
        {{ trans('cruds.company.title_singular') }} {{ trans('Master') }}
@can('company_create')
            <a class="btn btn-success" style="float: right;" href="{{ route("admin.companys.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.company.title_singular') }}
            </a>
            @endcan
    </div>
 @include('partials._alert')

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-company">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <!--<th>
                            {{ trans('cruds.company.fields.id') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.company.fields.cid') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.name') }}
                        </th>
                         <th>
                            {{ trans('cruds.company.fields.gst') }}
                        </th>
                      
                       <th>
                            {{ trans('Branches') }}
                        </th>
                         <th>
                            {{ trans('cruds.company.fields.address') }}
                        </th>
                         <th>
                            {{ trans('cruds.company.fields.logo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companys as $key => $company)
                        <tr data-entry-id="{{ $company->id }}">
                            <td>

                            </td>
                            <!--<td>
                                {{ $company->id ?? '' }}
                            </td>-->
                             <td>
                                {{ $company->cid ?? '' }}
                            </td>
                            <td>
                                {{ $company->cmname ?? '' }}
                            </td>
                            
                              <td>
                                 {{ $company->gst ?? '' }}
                               
                            </td>

                            <td>
                                 @foreach($company->cbranchs as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                          <td>
                                {{ $company->address ?? '' }}
                            </td>
                            <td>
                             <img class="img-rounded" style="height:35px; width: 35px;" src="{{ URL::asset("/public/image/clogo/".$company->logo) }}" alt="no">
                         </td>
                            <td>
                                @can('company_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.companys.show', $company->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('company_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.companys.edit', $company->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('company_delete')
                                    <form action="{{ route('admin.companys.destroy', $company->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        <!--<i type="submit" class="fa fa-trash-o btn btn-xs btn-danger" aria-hidden="true"  value="{{ trans('global.delete') }}"></i>-->
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
@can('company_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.companys.massDestroy') }}",
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
  $('.datatable-company:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>

@endsection