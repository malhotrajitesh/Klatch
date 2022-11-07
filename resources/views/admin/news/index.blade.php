@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('News') }} {{ trans('Master') }}
          @if(!empty($news))
    <span class="uvamargin20"> Active Page   {!! $news->currentPage() !!} </span>
    
   @endif
   @can('dycat_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <a class="btn btn-success" style="margin-right: auto; margin-left: auto;" href="{{ route('admin.dycats.index', ['cat' => 'cat5']) }}">
                 {{ trans('Add News Category') }}
            </a>
        </div>
    </div>
@endcan
        @can('news_create')
  
            <a class="btn btn-success" style="float: right;" href="{{ route("admin.news.create") }}">
                {{ trans('global.add') }} {{ trans('News') }}
            </a>
  
@endcan
    </div>
 @include('partials._alert')
    <div class="card-body">
        <div class="table-responsive">
          <span  class="uvamargin20">    {!! $news->links() !!} </span>
            <table class=" table table-bordered table-striped table-hover datatable datatable-new">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.incomeCategory.fields.id') }}
                        </th>
                         <th>
                            {{ trans('Category') }}
                        </th>
                        <th>
                            {{ trans('Title') }}
                        </th>
                          <th>
                            {{ trans('Data') }}
                        </th>
                          <th>
                            {{ trans('URL') }}
                        </th>
                          <th>
                            {{ trans('Pic') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $key => $new)
                        <tr data-entry-id="{{ $new->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $new->id ?? '' }}
                            </td>
                             <td>
                                {{ $new->news_cat ?? '' }}
                            </td>
                            <td>
                                {{ $new->nstitle ?? '' }}
                            </td>
                             <td>
                                {{ $new->nsdetail ?? '' }}
                            </td>
                             <td>
                                {{ $new->nslink ?? '' }}
                            </td>
                            <td>
                               <img class="img-rounded" style="height:40px; width: 40px;" src="{{ URL::asset("/public/image/news/".$new->nspic) }}" alt="no">
                               
                            </td>
                            <td>
                                @can('news_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.news.show', $new->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('news_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.news.edit', $new->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('news_delete')
                                    <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            {!! $news->links() !!}   <span class="uvamargin20"> Active Page   {!! $news->currentPage() !!} </span>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('news_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.news.massDestroy') }}",
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
  $('.datatable-new:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection