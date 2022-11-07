@extends('layouts.admin')
@section('content')
@can('report_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.reports.create") }}">
                {{ trans('global.add') }} {{ trans('New City') }}
            </a>
    
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('Reporting List') }} {{ trans('global.list') }}
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
                            {{ trans('Reported name') }}
                        </th>
                           <th>
                            {{ trans('Reported Type') }}
                        </th>
                           <th>
                            {{ trans('Reported Question') }}
                        </th>
                          <th>
                            {{ trans('Report Remark') }}
                        </th>
                           <th>
                            {{ trans('Reported By') }}
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
                    @foreach($reports as $key => $report)
                        <tr data-entry-id="{{ $report->id }}">
                            <td>

                            </td>
                             <td>
                              {{ $report->id ?? '' }}
                            </td>
                            <td>
                              @if($report->rptype == 'social')
                                <div class="show-read-more">
                                 {{ $report->ad_by->so_desc}}
                               </div> &nbsp;
                                  <a class="btn btn-xs btn-primary" style="float: right;" href="{{ route('admin.follows.verifyfollow', $report->rp_id) }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>   </a>
                            
                                @elseif($report->rptype == 'job')
                                {{ $report->ad_by->job_t ?? '' }}
                                 @elseif($report->rptype == 'event')
                                 {{ $report->ad_by->ev_title ?? '' }}
                                 @elseif($report->rptype == 'ad')
                                {{ $report->ad_by->adti ?? '' }}
                                
                                 @endif
                      
                                  

                            </td>
                            <td>
                                {{ $report->rptype ?? '' }}
                            </td>
                                <td>
                                {{ $report->rsqt ?? '' }}
                            </td>
                                <td>
                                {{ $report->rmark ?? '' }}
                            </td>
                               <td>
                                {{ $report->created_by->name ?? '' }}
                            </td>
                       
                           
                              <td>
                                @if($report->deletd_at)
                                Disabled
                                @else 
                                Active
                                @endif
                            </td>
                  
                            <td>
                    


                                @can('report_delete')
                                    <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('report_delete')
  let deleteButtonTrans = '{{ trans('Active') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reports.massDestroy') }}",
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

<script type="text/javascript">
$(document).ready(function(){
    var maxLength = 50;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function(){
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});
</script>
<style type="text/css">
    .show-read-more .more-text{
        display: none;
    }
</style>

@endsection