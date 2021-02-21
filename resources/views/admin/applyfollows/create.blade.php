
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
        {{ trans('Add Your') }} {{ trans('Education Details :-') }}
    </div>


    <div class="card-body">
         @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
        <form action="{{ route("admin.educations.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;University/College</span>
                            </div>
                            <input type="text" class="form-control" name="college">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Degree</span>
                            </div>
            <input type="text" id="degree" class="form-control" name="degree_name" value="">
            <input type="hidden" id="degreen" class="form-control" value="" >
      </div>
      </div> 
    </div>
    <br>
<div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Field Of Study</span>
                            </div>
                            <input type="text" class="form-control" name="fos">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Location</span>
                            </div>
            <input type="text" id="place" class="form-control"
                  name="uplace">
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
                            <input type="text" class="form-control date" name="e_from">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;End Date</span>
                            </div>
            <input type="text" id="place" class="form-control date" name="e_to">
      </div>
      </div> 
    </div>

    <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Obtained Marks</span>
                            </div>
                            <input type="text" class="form-control" name="get_no">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Total Marks</span>
                            </div>
            <input type="text" id="place" class="form-control" name="total_no">
      </div>
      </div> 
    </div>

     <br>
    <div class="row">
    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-flag"></i>&nbsp;Grade</span>
                            </div>
                            <input type="text" class="form-control" name="ugrade" title="optional">
                          </div></div>
        <div class ="col-md-6">
             <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-spinner fa-pulse fa-fw"></i>&nbsp;Activies</span>
                            </div>
            <input type="text" id="placeu" class="form-control" name="xtra">
      </div>
      </div> 
    </div>
    <br>
     <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-quote-left"></i>&nbsp;Description</span>
                            </div>
                            <input type="text" class="form-control" name="udesc" title="optional">
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

<script type="text/javascript">

    
   
    $(document).ready(function(){

      $( "#degree" ).autocomplete({
        source: function( request, response ) {
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
          // Fetch data
          $.ajax({
            url:"{{route('admin.educations.fetchdegree')}}",
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
            
          
          
           $('#degree').val(ui.item.label); 
      
           $('#degreen').val(ui.item.value); 

      return false;
        }
      });

    });

    </script>
 