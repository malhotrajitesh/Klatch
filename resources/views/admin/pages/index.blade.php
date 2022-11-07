@extends('layouts.admin')
@section('content')
@can('page_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.pages.create") }}">
                {{ trans('global.add') }} {{ trans('New Page') }}
            </a>
            <a class="btn btn-success" style="margin-right: 30%; margin-left: 30%" href="{{ route("admin.pages.feedback") }}">
                {{ trans('All') }} {{ trans('Feedback') }}
            </a>
             <a class="btn btn-success" style="float:right" href="{{ route("admin.pages.getbanner") }}">
                {{ trans('All') }} {{ trans('Banners') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('Pages') }} {{ trans('global.list') }}
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
                            {{ trans('Page Title') }}
                        </th>
                          <th>
                            {{ trans('Page Type') }}
                        </th>
                         <th>
                            {{ trans('Page Data') }}
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
                    @foreach($pages as $key => $page)
                        <tr data-entry-id="{{ $page->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $page->id ?? '' }}
                            </td>
                            <td>
                                {{ $page->page_title ?? '' }}
                            </td>
                             <td>
                              {{ $page->page_type ?? '' }}
                            
                            </td>
                            <td>
                              {{ substr($page->page_data,0,50) }} <br><a href='#'>Read More...</a>
                            
                            </td>
                           
                              <td>
                                @if($page->deletd_at)
                                Disabled
                                @else 
                                Active
                                @endif
                            </td>
                  
                            <td>
                                @can('page_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pages.show', $page->id) }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('page_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pages.edit', $page->id) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('page_delete')
                                    <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('page_delete')
  let deleteButtonTrans = '{{ trans('Active') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pages.massDestroy') }}",
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