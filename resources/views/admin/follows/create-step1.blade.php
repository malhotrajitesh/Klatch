@extends('layouts.admin')
@section('content')

<div class="card">
  <div class="card-header">
    {{ trans('global.create') }} {{ trans('follow') }}
  </div>

  <div class="card-body">
         <div style="margin-bottom: 10px;" class="row">

       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
      </div>
      @endif

      @if(count($errors)>0)
      <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
        <ul>
          @foreach($errors->all() as $error)
          <li style="list-style: none;">{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

    </div>

    <div class="card">
      <div class="card-header">
        {{ trans('Follows Details') }} {{ trans('global.list') }}
      </div>
      <div class="card-body col-lg-6">
    <form action="{{ route("admin.follows.postcreate-step1") }}" method="POST" enctype="multipart/form-data">
      @csrf
 
 
    
      <div class="form-group">
       <label>Title:</label>
       <input type="text" class="form-control" id="ename" name="so_title" value="{{$follow->so_title  ?? ''}}"> 
     </div>


  <div class="form-group">
    <label>Enter Description</label>
    <textarea class="form-control" rows="3" id="no" name="so_desc" value="{{$follow->so_desc ?? ''}}">{{$follow->so_desc ?? ''}}</textarea>
   
  </div>
   <div class="form-group">
              <label for="Tags">Tags:</label>
              <input type="text" data-role="tagsinput" class="form-control" name="tags" value="{{$follow->tag_names ?? ''}}">
            </div>





<input type="hidden"  value="{{ $follow->id ?? '' }}" class="form-control" id="follow" name="follow"/>
<input type="hidden"  value="1" class="form-control" id="step" name="so_step"/>
<input type="hidden"  value="UNFINISHED" class="form-control" id="jstatus" name="so_status"/>

<input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
<div>
  <input class="btn btn-danger" type="submit" value="{{ trans('Next') }}">
</div>
</form>
</div>
</div>
</div>
</div>




@endsection

@section('scripts')


<script>  
  $(document).ready(function(){
    $('#uva').on('change', function() {
      $("#uvaon").slideDown();
      if ( this.value == 'Offline')
      {
        $("#uvaol").slideDown();
        $("#uvaonlin").slideUp();
        
      }
      else
      {
        $("#uvaonlin").slideDown();
        $("#uvaol").slideUp();
      }
    });
  });
</script>
<script> 

  $(document).ready(function () {
    $("#uva").each(function () {
    	

      var sac = $(this).val($(this).find('option[selected]').val());



      if ( sac.val() == 'Offline')

      {
        $("#uvaon").slideDown();
        $("#uvaol").slideDown();
        $("#uvaonlin").slideUp();
        
      }
      else if(sac.val() == 'Online')
      {
        $("#uvaon").slideDown();
        $("#uvaonlin").slideDown();
        $("#uvaol").slideUp();
      }



    });
  })
</script>


<script>  
  $(document).ready(function(){
    $('#uvafollow').on('change', function() {

    	$("#uvatime").slideDown();
      if ( this.value == 'Multi Day')
      {
        $("#uvat2").slideDown();

        
      }
      else
      {

        $("#uvat2").slideUp();
      }
    });
  });
</script>


<script>
  $(document).ready(function () {
    $("#uvafollow").each(function () {
 

      var sac2 = $(this).val($(this).find('option[selected]').val());

     

       if(sac2.val() == 'Multi Day')

       {
            $("#uvatime").slideDown();

        $("#uvat2").slideDown();
      }
      else if(sac2.val() == 'Single Day')
      {
            $("#uvatime").slideDown();

       $("#uvat2").slideUp();
     }



 });
  })
</script>




<script type="text/javascript">



  $(document).ready(function(){

    $( "#ecity" ).autocomplete({
      source: function( request, response ) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          // Fetch data
          $.ajax({
            url:"#",
            type: 'post',
            dataType: "json",
            data: {

             search: request.term
           },
           success: function( data ) {
             response( data );

           }
         });
        },
        select: function (follow, ui) {

      
          
          $('#ecity').val(ui.item.label); 

          


          return false;
        }
      });

  });

</script>




@endsection

