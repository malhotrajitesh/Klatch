@extends('layouts.admin')
@section('content')
@can('dycat_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
        
            <a class="btn btn-success" href="{{ route('admin.dycats.index', ['cat' => 'cat1']) }}">
               {{ trans('Cat 1') }}
            </a>
            <a class="btn btn-success" style="margin-right: auto; margin-left: auto;" href="{{ route('admin.dycats.index', ['cat' => 'cat2']) }}">
                 {{ trans('Cat 2') }}
            </a>
             <a class="btn btn-success" style="margin-right: auto; margin-left: auto;" href="{{ route('admin.dycats.index', ['cat' => 'cat3']) }}">
                 {{ trans('Cat 3') }}
            </a>
             <a class="btn btn-success" style="margin-right: auto; margin-left: auto;" href="{{ route('admin.dycats.index', ['cat' => 'cat4']) }}">
                 {{ trans('Cat 4') }}
            </a>
        </div>
    </div>
@endcan
   <div style="margin-bottom: 10px;" class="row">
    
                   <form class="form-inline" action="{{ route("admin.dycats.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="col-lg-6">
            <div class="form-group">
                <label for="description">{{ trans('Cat Name') }}</label>
                <input type="text"  name="cat_name" class="form-control" value="" required>
            </div> 
        </div>
        <input type="hidden"  name="cat_type" class="form-control" value="{{ $sat }}" required>
        <div class="col-lg-4">
           <div class="form-group">
           <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}"> 
      
                <input style="margin-top: 15px;" class="btn btn-danger" type="submit" value="{{ trans('global.save')  }} {{ $sat }}">
                
      </div>
</div>
        </form>
   
        </div>
<div class="card">
    <div class="card-header">
        {{ $sat }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-dycat">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('Id') }}
                        </th>
                        <th>
                            {{ trans('Category Title') }}
                        </th>
                        
                          <th>
                            {{ trans('Status') }}
                        </th>
                  
                        <th>
                            {{ trans('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dycats as $key => $dycat)
                        <tr data-entry-id="{{ $dycat->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dycat->id ?? '' }}
                            </td>
                            <td>
                                {{ $dycat->cat_name ?? '' }}
                            </td>
                        
                           
                              <td>
                                @if($dycat->deletd_at)
                                Disabled
                                @else 
                                Active
                                @endif
                            </td>
                  
                            <td>
                                @can('dycat_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dycats.show', $dycat->id) }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('dycat_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dycats.edit', $dycat->id) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @endcan

                                @can('dycat_delete')
                                    <form action="{{ route('admin.dycats.destroy', $dycat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dycat_delete')
  let deleteButtonTrans = '{{ trans('Active') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dycats.massDestroy') }}",
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
    dycatLength: 100,
  });
  $('.datatable-dycat:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection