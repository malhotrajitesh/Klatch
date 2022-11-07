@extends('layouts.admin')
@section('content')
@include('partials._admin_ad')

<div class="card">
    <div class="card-header">
        {{ trans('Ad Master') }} {{ trans('global.list') }}
                  @if(!empty($ads))
    <span class="uvamargin20"> Active Page   {!! $ads->currentPage() !!} </span>
    
   @endif
    </div>

    <div class="card-body">
      @include('partials._alert')
        <div class="table-responsive">
          <span  class="uvamargin20">    {!! $ads->links() !!} </span>
            <table class=" table table-bordered table-striped table-hover datatable datatable-ad">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                      
                           <th>
                            {{ trans('Created At') }}
                        </th>
                        <th>
                            {{ trans('Ad Title') }}
                        </th>
                          <th>
                            {{ trans('Description') }}
                        </th>
                    
                          <th>
                            {{ trans('Quantity') }}
                        </th>
                      
                            <th>
                            {{ trans('City') }}
                        </th>
                        
                          <th>
                            {{ trans('Created By') }}
                        </th>
                            <th>
                            {{ trans('Image') }}
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
                    @foreach($ads as $key => $ad)
                        <tr data-entry-id="{{ $ad->id }}">
                            <td>

                            </td>
                       
                              <td>
                                {{ $ad->updated_at ?? '' }}
                            </td>
                            <td>
                                {{ $ad->adti ?? '' }}
                            </td>
                               <td>
                                {{ $ad->adtd ?? '' }}
                            </td>
                        
                           
                               <td>
                                {{ $ad->qty ?? '' }}
                            </td>
                            
                                    <td>
                                {{ $ad->ad_city ?? '' }}
                            </td>
                                 <td>
                                {{$ad->created_by->name ?? ''}}
                            </td>

                              <td> <img alt="ad Image" class="img-rounded" style="height:35px; width: 40px;" src="{{URL::asset("/public/image/uvaad/".$ad->ad_pic ?? '') }}"/> </td>
                                 <td>
                                  @if($ad->ad_status == 'Pending')
                                <h5 class="flash">{{ $ad->ad_status ?? '' }}</h5>
                                @else
                                {{ $ad->ad_status ?? '' }}
                                @endif
                            </td>

                            <td>


                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ads.edit', $ad->id) }}">
                                        {{ trans('Actions') }}
                                    </a>
                            

                              
                              <!--
                                @can('income_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.income-categories.show', $ad->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                            
                                @can('income_category_delete')
                                    <form action="{{ route('admin.income-categories.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                           -->
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $ads->links() !!}   <span class="uvamargin20"> Active Page   {!! $ads->currentPage() !!} </span>
        </div>


    </div>
</div>
@endsection
@section('scripts')
<style>
  .flash {
   animation-name: flash;
    animation-duration: 0.2s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    animation-play-state: running;
}

@keyframes flash {
    from {color: red;}
    to {color: blue;}
}
</style>
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('income_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.income-categories.massDestroy') }}",
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
  $('.datatable-ad:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection