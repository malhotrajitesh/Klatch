@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('Job') }} {{ trans('Step 1') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jobs.postcreate-step1") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class ="col-sm-6">
                  <div class="form-group {{ $errors->has('j_cat_id') ? 'has-error' : '' }}">
                <label for="job_category">{{ trans('Job Category') }}</label>
                <select name="j_cat_id" id="jb_category" class="form-control select2">
                    @foreach($job_categories as $id => $job_category)
                        <option value="{{ $id }}" {{ (isset($job) && $job->job_cats ? $job->job_cats->id : old('j_cat_id')) == $id ? 'selected' : '' }}>{{ $job_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('j_cat_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('j_cat_id') }}
                    </em>
                @endif
            </div>
          </div>


              <div class ="col-sm-6">
                <div class="form-group">
                   <label for="jentity">Select Entity Type</label>
              <select name="jentity" id="uva" class="form-control select2">
                  <option value="null">Select Entity</option>
                    @foreach($ad_entitys as $id => $ad_entity)

                        <option value="{{ $id }}" {{ (isset($job) && $job->entitys ? $job->entitys->id : old('jentity')) == $id ? 'selected' : '' }}>{{ $ad_entity }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
<div class="row">
            <div class ="col-sm-3">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control"  name="jname" value="{{ $user->name ?? ''  }}">
                </div>
            </div>
              <div class ="col-sm-3">
                <div class="form-group">
                    <label>email:</label>
                    <input type="text" class="form-control" id="mobile" name="jemail" value="{{ $user->email ?? ''  }}">
                </div>
            </div>
             <div class ="col-sm-3">
                <div class="form-group">
                    <label>Contact Number :</label>
                    <input type="text" class="form-control" id="cnams" name="jmobile" value="{{ $user->mobile ?? ''  }}">
                </div>
            </div>
             <div class ="col-sm-3" id="uva2" style="display: none;">
                <div class="form-group">
                    <label>Address :</label>
                    <input type="text" class="form-control" id="jadd" name="jadd" value="{{ $user->address ?? ''  }}">
                </div>
            </div>
           
        </div>


    
    <div id="dev" style="display: none;">   
<div class="row">
<div class="col-sm-3">
     <label>Business Name:</label>
    <input type="text" class="form-control" id="cmp" name="cmp_name" value="{{$job->company->cmname  ?? ''}}">
    <input type="hidden" class="form-control" id="cmpn" name="cmp_id">
</div>
<div class="col-sm-3">
    <label>Business Email:</label>
    <input type="text" class="form-control" id="cb" name="email" value="{{$job->company->email  ?? ''}}">
</div>
<div class="col-sm-3">
     <label>Logo:</label>
      <input type="file" name="logo" placeholder="Choose image" id="image" value="">
                           
                        <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">
                             @if(isset($job->company->logo))
 
   <img alt="Logo" style="max-height: 113px;  max-width: 113px;" src="{{ URL::asset("/public/image/clogo/".$job->company->logo ?? '') }}"/>
          @endif
    
</div>
<div class="col-sm-3">
    <label>Contact person:</label>
   <input type="text" class="form-control" id="uva_cn" name="cpname" value="{{$job->company->cpname  ?? ''}}"> 
</div>

    </div>
<div class="row">
<div class="col-sm-3">
     <label>Contact number:</label>
    <input type="text" class="form-control" id="uva_con" name="contact_no" value="{{$job->company->contact_no  ?? ''}}">
   
</div>

<div class="col-sm-3">
     <label>Incorporation certificate:</label>
      <input type="file" name="inco_cert" placeholder="Choose image" id="image2" value="">
                           
                        <img id="image_preview_container2"   src=""
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">

                                                @if(isset($job->company->inco_cert))
 
   <img alt="Incorporation Image" style="max-height: 113px;  max-width: 113px;" src="{{ URL::asset("/public/image/ucert/".$job->company->inco_cert ?? '') }}"/>
          @endif 
    
</div>
<div class="col-sm-3">
    <label>Branches
      <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span>
                  </label>

          <select name="cbranchs[]" id="branchs" class="form-control select2" multiple="multiple">
                @foreach($cbranchs as $id => $cbranchs)
                <option value="{{ $id }}" {{ (in_array($id, old('cbranchs', [])) || isset($job) && $job->cbranchs->contains($id)) ? 'selected' : '' }}>{{ $cbranchs }}</option>
                @endforeach
            </select>
   
</div>

    </div>

</div>
    


</div>
<input type="hidden"  value="{{ $job->id ?? '' }}" class="form-control" id="job" name="job"/>
<input type="hidden"  value="1" class="form-control" id="step" name="jstep"/>
           <input type="hidden"  value="UNFINISHED" class="form-control" id="jstatus" name="jstatus"/>

<input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
 <div>
    <input class="btn btn-danger" type="submit" value="{{ trans('Next') }}">
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
            $('#image_preview_container2').show();
          
           $('#cmp').val(ui.item.label); 
      
           $('#cmpn').val(ui.item.value); 
            $("#cb").val(ui.item.email);
            $("#uva_cn").val(ui.item.cname);
            $("#uva_con").val(ui.item.mno);
             $("#uva_pan").val(ui.item.pan);
              $("#branchs").html(ui.item.cbranch);

            

            


            $("#image").hide();
            $("#image2").hide();

          $('#image_preview_container').attr('src', 'http://dentos.uvatech.co/public/image/clogo/'+ ui.item.logo); 
           $('#image_preview_container2').attr('src', 'http://dentos.uvatech.co/public/image/ucert/'+ ui.item.cert); 
          
           

      return false;
        }
      });

    });

    </script>
    <script type="text/javascript">
       $('#cb').change(function(){
    $("#image").show();
    $('#image_preview_container').hide();
    $("#image2").show();
    $('#image_preview_container2').hide();
  });

    </script>
     <script> 

    $(document).ready(function () {
    $("#uva").each(function () {

    var sac = $(this).val($(this).find('option[selected]').val());
    
var das= sac.val();


    if(!!das){
     
     
       if ( sac.val() == '1')
    
      {
        $("#uva2").slideDown();
       $("#dev").slideUp();
        
      }
      else
      {
        $("#dev").slideDown();
        $("#uva2").slideUp();
      }
}


    });
})
 </script>

    <script>  
$(document).ready(function(){
    $('#uva').on('change', function() {
      var sad= this.value;

if(sad != 'null'){

      if ( this.value == '1')
      {
        $("#uva2").slideDown();
       $("#dev").slideUp();
        
      }
      else
      {
        
        $("#dev").slideDown();
        $("#uva2").slideUp();
      }
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

 