@extends('layouts.admin')
@section('content')
@include('partials._follow_me')

<div class="card">
  <div class="card-header">
      @can('like_create')
    <a class="btn btn-success" style="float: right" href="{{ route("admin.follows.create-step1") }}">
      {{ trans('global.add') }} {{ trans('follow') }}
    </a>
    @endcan
    {{ trans('Posted') }} {{ trans('Follows') }}
  </div>

  <div class="card-body">
    @include('partials._alert')
    <div class="table-responsive">
      <table class=" table table-bordered table-striped table-hover datatable datatable-follow">
        <thead>
          <tr>
            <th width="10">

            </th>
            <th>
              {{ trans('Sr. No.') }}
            </th>
        
            <th>Title</th>
            <th> Desc</th>
            <th>Tags</th>
          
            <th>
              {{ trans('Status') }}
            </th>
            <th>
              &nbsp;
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($follows as $key => $follow)
          <tr data-entry-id="{{ $follow->id }}">
            <td>

            </td>
            <td>
              {{ $follow->id ?? '' }}
            </td>
        
            <td><strong>{{$follow->so_title ?? ''}}</strong></td>

          

        
              <td>
              {{ $follow->so_desc ?? '' }}
            </td>
               <td>
                 <strong>Tag:</strong>
                @foreach($follow->tags as $tag)
                    <label class="label label-info">#{{ $tag->name }}</label>
                @endforeach
            
            </td>
             <td>
              {{ $follow->so_status ?? '' }}
            </td>
          
            <td>
              <div class="row"> 
              @php
              $nfollow=$follow->id ?? '';
              @endphp

               @if($follow->ev_interest != 0)
              
              <div class="col-sm-2"> 
              <a  href="#">
               <i class="fa fa-address-book fa-2x" style="color: red;" aria-hidden="true" title="Interested Persons"></i>
             </a>
           </div>
             @endif

         
              @if($follow->so_status == 'Approve')
              <div class="col-sm-2"> 
                       <a  href="#close" onclick="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       <i class="fas fa-times-circle  fa-lg" style="color: red;" aria-hidden="true" title="Close follow"></i>
                                    </a>

</div>
                     @endif


             @if($follow->so_status == 'UNFINISHED')
             <div class="col-sm-2"> 
               <a  href="{{ route('admin.follows.pendfollow', compact('nfollow')) }}">
               <i class="fa fa-pencil-square-o fa-lg" style="color: blue;" aria-hidden="true" title="Complete follow"></i>
             </a>
           </div>
<div class="col-sm-2"> 
               <form action="{{ route('admin.follows.destroy', $follow->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit">
    <i class="fas fa-trash-alt fa-lg" style="color: red;" title="Delete follow"></i> 
</button>

</form>
</div>

             @endif
</div>

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
  
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
      text: deleteButtonTrans,
      url: "{{ route('admin.follows.massDestroy') }}",
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
   

    $.extend(true, $.fn.dataTable.defaults, {
      order: [[ 1, 'desc' ]],
      pageLength: 100,
    });
    $('.datatable-follow:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
    });
  })

</script>
@endsection