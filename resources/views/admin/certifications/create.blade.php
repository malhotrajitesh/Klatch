
  <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
     <link href="{{ asset('jqueryui/jquery-ui.min.css') }}" rel="stylesheet" />

           <style>
                .ui-autocomplete {
  z-index: 215000000 !important;
}
</style>

<div class="card">
    <div class="card-header">
        {{ trans('Add Your') }} {{ trans('Certification Details :-') }}
    </div>


    <div class="card-body">
         @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
        <form action="{{ route("admin.certifications.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Certificate Name</span>
                            </div>
                            <input type="text" class="form-control" name="cert_name" required>
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Validity</span>
                            </div>
           <input type="text" class="form-control date" name="cert_date">
      </div>
      </div> 
    </div>
    <br>
<div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Upload Certificate</span>
                            </div>
                            <input type="file" id="image" class="form-control" name="cert_file">
                        
                          </div></div>
<div class ="col-md-4">
                              <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                        </div>
        <div class ="col-md-2">
            
              <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
            
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
</form>
</div>
</div>







  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('jqueryui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

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

 