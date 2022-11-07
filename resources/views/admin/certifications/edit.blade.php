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
        {{ trans('global.edit') }} {{ trans('certification Details') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.certifications.update", [$certification->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        

              <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Certificate Name</span>
                            </div>
                            <input type="text" class="form-control" name="cert_name" value="{{ old('cert_name', isset($certification) ? $certification->cert_name : '') }}">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Validity</span>
                            </div>
           <input type="text" class="form-control date" name="cert_date" value="{{ old('cert_date', isset($certification) ? $certification->cert_date : '') }}">
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
                            <input type="file" id="image" class="form-control" name="cert_file" value="{{ old('cert_file', isset($certification) ? $certification->cert_file : '') }}">
                             </div></div>
                            <div class ="col-md-4">
                            <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                              @if(isset($certification->cert_file))
 
   <img alt="cert image" style="max-height: 150px;  max-width: 150px;" src="{{ URL::asset("/public/image/uvapcert/".$certification->cert_file ?? '') }}"/>
          @endif
                   </div>      
        <div class ="col-md-2">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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