 

  <head>
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
      <style type="text/css">
     fieldset {
        overflow: hidden
      }
      
      .some-class {
        float: left;
        clear: none;
      }
      
      .docsz {
        float: left;
        clear: none;
        display: block;
        padding: 0px 1em 0px 8px;
      }
      
      input[type=radio],
      input.radio {
        float: left;
        clear: none;
        margin: 2px 0 0 2px;
      }
      </style>
  </head>





  <div class="card">
      <div class="card-header"><i class="fa-fw fas fa-tasks nav-icon" style="color:#000;"></i>
          {{ trans('global.create') }} {{ trans('Job Profile') }}
      </div>

      <div class="card-body">
          <form action="{{ route("admin.jobs.jpstore") }}" method="POST" enctype="multipart/form-data">
              @csrf
           

              
  <div class="row">
      <div class="col-sm-3">
       <div class="form-group {{ $errors->has('j_cat_id') ? 'has-error' : '' }}" required>
                  <label for="job_category">{{ trans('Job Category') }}</label>
                  <select name="job_cat_id" id="jb_category" class="form-control select2">
                      @foreach($job_categories as $id => $job_category)
                          <option value="{{ $id }}">{{ $job_category }}</option>
                      @endforeach
                  </select>
             
              </div>
    </div>
      <div class="col-sm-3">
             <div class="form-group ">
                  <label for="name">{{ trans('Name') }}*</label>
                  <input type="text" id="pmname" name="name" class="form-control" value="" required>
             
              </div>
          </div>
              <div class="col-sm-6">
                <div class="form-group ">
                  <label for="jpaddress">{{ trans(' Address') }}*</label>
                  <input type="text" id="jpaddress" name="jpaddress" class="form-control" value="" required>
              
              </div>
          </div>
            
  </div>
      <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                  <label for="jpcity">{{ trans('City') }}*</label>
                  <input type="text" id="jpcity" name="jpcity" class="form-control" value="" required>
              
              </div>   
                 

      </div>
   <div class="col-sm-3">
            <div class="form-group">
                  <label for="state">{{ trans('State') }}*</label>
                  <input type="text" id="state" name="jpstate" class="form-control" value="" required>
               
              </div>
          </div>

           <div class="col-sm-3">
        <div class="form-group">
                  <label for="pincode">{{ trans('Pincode') }}*</label>
                  <input type="text" id="pincode" pattern="[0-9]{6}" name="jppincode" maxlength="6" class="form-control" value="" required>
              
              </div>
          </div>
          <div class="col-sm-3">
                 <div class="form-group">
                  <label for="co">{{ trans('Mobile') }}</label>
                  <input type="text" pattern="[0-9]{10}" name="jpmobile" maxlength="10" class="form-control" value="">

              </div>
          </div>
  </div>
  <div id="hospi" style="display: none;">
   <div class="row">
           
                <div class="col-sm-4">
                   <div class="form-group">
                  <label for="Clinic">{{ trans('Hospital Registration Number') }}*</label>
                  <input type="text" id="state" name="jpregno" class="form-control" value="">
                 </div>
              </div>
              <div class="col-sm-4">
                   <div class="form-group">
                  <label for="Clinic">{{ trans('Contact Person') }}*</label>
                  <input type="text" id="state" name="jpconame" class="form-control" value="">
                 </div>
              </div>
            </div>
         </div>
   

  <div id="ciop" style="display: none;">
         <div class="row">
        <div class="col-sm-6">
         <div class="form-group">  
           <label  for="xy">{{ trans(' Are You a Doctor At This Clinic') }}*</label>
       <fieldset>
        <div class="some-class">
         
          <input type="radio" class="radio" name="jpdocter" value="Yes" id="y" />
          <label class="docsz" for="y">Yes</label>
          <input type="radio" class="radio" name="jpdocter" value="No" id="z" />
          <label class="docsz" for="z">No</label>
        </div>
      </fieldset>
    </div>
     </div>
     
   <div class="col-sm-6">
   <div id="ano" style="display: none;"> 
    <div class="form-group">  
           <label for="xy">{{ trans(' Is There Currently Doctor Working At This Clinic') }}*</label> 
       <fieldset>
        <div class="some-class">
          
          <input type="radio" class="radio" name="jdwork" value="Yes" id="yx" />
          <label class="docsz" for="y">Yes</label>
          <input type="radio" class="radio" name="jdwork" value="No" id="zx" />
          <label class="docsz" for="z">No</label>
        </div>
      </fieldset>
     </div>
   </div>
  </div>
  </div>


    
          <div class="row">
            
        <div class="col-sm-4" id="tno" style="display: none">
         
                   <div class="form-group" >
                  <label for="Clinic">{{ trans('Clinic Owner Name') }}*</label>
                  <input type="text" id="noa" name="jpclinici" class="form-control" value="">
                 </div>
              </div>
           
           
              <div class="col-sm-4 fyes" style="display: none">
                   <div class="form-group">
                  <label for="Clinic">{{ trans('Doctor Name') }}*</label>
                  <input type="text" id="nob" name="jdname" class="form-control" value="">
                 </div>
              </div>
                <div class="col-sm-4 fyes" style="display: none">
                   <div class="form-group">
                  <label for="Clinic">{{ trans('Doctor Registration Number') }}*</label>
                  <input type="text" id="noc" name="jpregno" class="form-control" value="">
                 </div>
              </div>
            
          </div>
  </div>
<div class="row">
               
                  <div class="form-group">

                          <input type="file" name="jppica" placeholder="Choose image" id="image" value="">
                         
                      <img id="image_preview_container"   src=""
                          alt="preview image" style="max-height: 150px; display: none; float: right;">
                
              
                    
                      </div>
                

                
          
           
           

            

              

             
           
            

             

    
                 
            
            <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
            
             
              <div>
                  <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
          
</div>
</div>
</form>
</div></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
  

  
      
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
    $("#jb_category").change(function() {
     var priceo = $("#jb_category").val();
      if(priceo==1) {
         $("#hospi").slideUp();
        $("#ciop").slideDown();
           
      }
      else{
         $("#ciop").slideUp();
         $("#hospi").slideDown();
      }
     

  });

  </script>

  <script>
    $("#y").click(function() {
        $("#ano").slideUp();
        $(".fyes").slideDown();
        $("#tno").slideUp();   

  });

  </script>
  <script>
    $("#z").click(function() {
    
        $("#ano").slideDown();
        $("#tno").slideUp();   

  });

  </script>

  <script>
    $("#zx").click(function() {
    $(".fyes").slideUp();
      
        $("#tno").slideDown();   

  });

  </script>

  <script>
    $("#yx").click(function() {
    $(".fyes").slideDown();
      
        $("#tno").slideUp();   

  });

  </script>






  





