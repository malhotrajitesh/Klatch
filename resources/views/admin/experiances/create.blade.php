
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
        {{ trans('Add Your') }} {{ trans('experiance Details :-') }}
    </div>


    <div class="card-body">
         @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
        <form action="{{ route("admin.experiances.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="row">
    <div class ="col-md-12">
               <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Previous Experiance</span>
                            </div>
                             <select class="form-control" id="uvaver" name="exp_type">
                  <option selected disabled value="0">...Select Previous Experiance</option>
                          <option value="Fresher">Fresher</option>
                          <option value="Intern">Intern</option>
                          <option value="No Experience">No Experience</option>
                          <option value="Work Experience">Work Experience</option>
                </select>
                           
                          </div></div>
                            </div>
                            <div id="uvaexp">
                            <div class="row">
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Title</span>
                            </div>
            <input type="text" id="degree" class="form-control" name="etitle" value="">
            
      </div>
      </div> 
  
    <br>

    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Employment Type</span>
                            </div>
                          
                              <select class="form-control" id="etype" name="emp_type">
                  <option selected disabled value="0">...Select Employment Type</option>
                          <option value="Part-Time">Part-Time</option>
                          <option value="Full-Time">Full-Time</option>
                           <option value="Contract">Contract</option>
                         
                </select>
                          </div></div>
                        </div>
                        <br>
                        <div class="row">
        <div class ="col-md-4">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Company Name</span>
                            </div>
            <input type="text" id="place" class="form-control"
                  name="cmp_name">
      </div>
      </div> 
   
<br>
    
    <div class ="col-md-4">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Company Location</span>
                            </div>
                            <input type="text" class="form-control" name="cmp_loc">
                          </div></div>
        <div class ="col-md-4">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Current Job</span>
                            </div>
            <input type="checkbox" id="checkbox" class="form-control" name="c_job" value="checked">
      </div>
      </div> 
    </div>

    <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Start Date</span>
                            </div>
                            <input type="text" class="form-control date" name="estart">
                          </div></div>
        <div class ="col-md-6" id="uend">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;End Date</span>
                            </div>
            <input type="text" id="not" class="form-control date" name="exend">
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




 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('jqueryui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>  
$(document).ready(function(){
    $('#uvaver').on('change', function() {
      if ( this.value == 'Work Experience')
      {
        $("#uvaexp").slideDown();
      
        
      }
      else
      {
        
        $("#uvaexp").slideUp();
      }
    });
});
</script>


<script>
    $(document).ready(function () {
    $("#uvaver").each(function () {

    var sac = $(this).val($(this).find('option[selected]').val());

    if(sac.val() != 'null'){
     
       if ( sac.val() == 'Work Experience')
    
      {
        $("#uvaexp").slideDown();
      }
      else
      {
       $("#uvaexp").slideUp();
      }
}


    });
})
 </script>

<script>
  $("#checkbox").change(function() {
    if(this.checked) {
         $("#uend").slideUp();
    }
    else{
       $("#uend").slideDown();
    }
   

});

</script>

   