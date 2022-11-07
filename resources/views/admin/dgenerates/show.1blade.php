@extends('layouts.admin')
@section('content')


            
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
 <div class="card">
    <div class="card-header">
        {{ trans('Table Fields') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                         @foreach($results[1] as $key=>$value)
                      
                        <th>
                            {{ $key }}
                        </th>
                      @endforeach
                    
                    </tr>
                </thead>
                <tbody>
                  <?php $umod = array_slice( $results, 0, null, true);  $i=1; ?>
                   @foreach($umod as $row)
                        <tr data-entry-id="">
                           <td>
{{$i++}} &nbsp;
                            </td>
                          @foreach($row as $cell)
                      
                            <td>
                               {{ $cell }}
                            </td>
                         @endforeach
                               
                         
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('') }}'
  let deleteButton = {
    text: deleteButtonTrans,
  
    
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 0, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection