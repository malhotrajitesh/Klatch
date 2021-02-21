@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('Job') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jobs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class ="col-sm-6">
                   <div class="form-group">
                    <label for="adscat_category">{{ trans('Job Category') }}</label>
                    <select name="j_cat_id" id="jcat" class="form-control select2">
                        @foreach($job_categories as $id => $job_category)
                        <option value="{{ $id }}">{{ $job_category }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
              <div class ="col-sm-6">
                <div class="form-group">
                   <label for="description">Select Entity Type</label>
            <select class="form-control" name="ad_type" id="uva">
                <option value="Individual">Individual</option>
                <option value="Proprietor">Proprietor</option>
                <option value="Partnership">Partnership</option>
                <option value="LLP">LLP</option>
                <option value="Pvt Ltd">Pvt Ltd</option>
              
            </select>
                </div>
            </div>
        </div>
<div class="row" id="uva2" style="display: none;">
            <div class ="col-sm-3">
                <div class="form-group">
                    <label>email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
              <div class ="col-sm-3">
                <div class="form-group">
                    <label>mobile:</label>
                    <input type="text" class="form-control" id="mobile" name="contact_no">
                </div>
            </div>
             <div class ="col-sm-3">
                <div class="form-group">
                    <label>Contact Person Name :</label>
                    <input type="text" class="form-control" id="cnams" name="cpname">
                </div>
            </div>
              <div class ="col-sm-3">
                <div class="form-group">
                    <label> City :</label>
                    <input type="text" class="form-control" id="job-title" name="city">
                </div>
            </div>
        </div>


    
    <div id="dev" style="display: none;">   
<div class="row">
<div class="col-sm-3">
     <label>Business Name:</label>
    <input type="text" class="form-control" id="cmp" name="cmp_name">
    <input type="hidden" class="form-control" id="cmpn" name="cmp_id">
</div>
<div class="col-sm-3">
    <label>Business Email:</label>
    <input type="text" class="form-control" id="cb" name="email">
</div>
<div class="col-sm-3">
     <label>Logo:</label>
      <input type="file" name="logo" placeholder="Choose image" id="image" value="">
                           
                        <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">
    
</div>
<div class="col-sm-3">
    <label>Contact person:</label>
   <input type="text" class="form-control" id="jpst" name="cpname"> 
</div>

    </div>
<div class="row">
<div class="col-sm-3">
     <label>Contact number:</label>
    <input type="text" class="form-control" id="uva_con" name="contact_no">
   
</div>
<div class="col-sm-3">
    <label>PAN number:</label>
    <input type="text" class="form-control" id="cb" name="pan_nmber">
</div>
<div class="col-sm-3">
     <label>Incorporation certificate:</label>
      <input type="file" name="inco_cert" placeholder="Choose image" id="image2" value="">
                           
                        <img id="image_preview_container2"   src=""
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">
    
</div>
<div class="col-sm-3">
    <label>Branches</label>
            <select name="branchs[]" id="branches" class="form-control select2" multiple="multiple" required>
                @foreach($cbranchs as $id => $cbranchs)
                <option value="{{ $id }}" >{{ $cbranchs }}</option>
                @endforeach
            </select>
   
</div>

    </div>

</div>
    


</div>

<input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
 <div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>


</form>
</div>



</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    
   
    $(document).ready(function(){

      $( "#cmp" ).autocomplete({
        source: function( request, response ) {
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
          // Fetch data
          $.ajax({
            url:"{{route('admin.jobs.fetchname')}}",
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
        select: function (event, ui) {
            
            $('#image_preview_container').show();
          
           $('#cmp').val(ui.item.label); 
      
           $('#cmpn').val(ui.item.value); 
            $("#image").hide();

          $('#image_preview_container').attr('src', 'http://dentos.uvatech.co/public/image/'+ ui.item.logo); 
          
            $("#cb").val(ui.item.city);

      return false;
        }
      });

    });

    </script>
    <script type="text/javascript">
    	 $('#cb').change(function(){
    $("#image").show();
    $('#image_preview_container').hide();
  });

    </script>

    <script>  
$(document).ready(function(){
    $('#uva').on('change', function() {
      if ( this.value == 'Individual')
      {
      	$("#uva2").slideDown();
       $("#dev").slideUp();
        
      }
      else
      {
        $("#dev").slideDown();
        $("#uva2").slideUp();
      }
    });
});
</script>




     <script>
  $('#image').change(function(){
     $('#image_preview_container').show();

  
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 

   });
 </script> 

     <script>
  $('#image2').change(function(){
     $('#image_preview_container2').show();

  
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container2').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 

   });
 </script> 

 @endsection

 