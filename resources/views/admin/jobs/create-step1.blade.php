  @extends('layouts.admin')
  @section('content')

  <div class="card">
      <div class="card-header">
          {{ trans('global.create') }} {{ trans('Job') }} {{ trans('Step 1') }}
      </div>

      <div class="card-body">
          <form action="{{ route("admin.jobs.postCreateStep1") }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="content">
              <div class="row">
                <div class="col-md-10">
    <div class="card mb-0">
                 <div class="card-header">
             
                          <a class="card-title">
                            <h5 class="d-inline-block h5 font-weight-bold mb-0">Job Profiles</h5> 
                     
                          </a>
                       
                      </div>
                      <div class="card-body" id="educationBackgroundBody"> 
                      @foreach($jprofiles as $key => $education)

                          <div>
                             <p class="float-right text-danger targetEducDiv"><i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteEducation{{$education->id}}"></i></p> 
                        
                        
                         
                             <h5 class="h5 text-info"> <input type="radio" class="radio" name="cmp_id" value="{{$education->id}}"  /> &nbsp; {{ $education->name ?? '' }} &nbsp; {{ $education->jobcategry->name ?? '' }}</h5>                           
                             <h6 class="h6 text-black">{{ $education->jpaddress ?? '' }}    &nbsp; 
                              <span class="h6 mb-2 text-muted">{{ $education->jpcity ?? '' }}</span>  &nbsp;  
                              <span class="mt-3 text-info">{{ $education->jpstate ?? '' }}</span>&nbsp; 
                               <span class="mt-3 text-info">{{ $education->jpmobile ?? '' }}</span>  &nbsp; 
                             </h6> 
                             
                           
                            
                             <hr>
                          </div>

                            <div class="modal fade" id="deleteEducation{{$education->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4>REMOVE EDUCATION</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                        <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$education->name}}"</span> from your Job profile?</h6>
                                       
                                     
                                      </div>
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                         <a  class="btn btn-primary deleteEducation px-5 udev" style="float: right;"  href="{{ route('admin.jobs.destroyj', $education->id) }}">Yes</a>
                                          
                                     
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                      
                      @endforeach
                       </div>
                    </div>
                </div>

                <div class="col-md-2">
               <div style="margin-top: 20px;">
        
              <a class="btn btn-success" data-custom='open_modal' href="{{ route("admin.jobs.jpxiew") }}">
                  {{ trans('global.add') }} {{ trans('Job Profile') }}
              </a>
          
            </div>
          </div>

  <input type="hidden"  value="{{ $job->id ?? '' }}" class="form-control" id="job" name="job"/>
  <input type="hidden"  value="1" class="form-control" id="step" name="jstep"/>
 <input type="hidden"  value="UNFINISHED" class="form-control" id="jstatus" name="jstatus"/>

  <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
 
  </div>
  <div>
      <input class="btn btn-danger" type="submit" value="{{ trans('Next') }}">
  </div>
   </div>                 



  </form>
  </div>



  </div>
  </div>
  @endsection

  @section('scripts')

  <script>
     $("body").on('click', "[data-custom='open_modal']", function (event) {
        event.preventDefault();
        var btn = $(this);
        var link = $(this).attr('href');
        var title = $(this).text();
        $('#custom_modal_resource').remove();
        var modal = '<div class="modal" id="custom_modal_resource">\
        <div class="modal-dialog modal-lg">\
        <div class="modal-content">\
        <div class="modal-header">\
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
        <h4 class="modal-title">'+ title + '</h4>\
        </div>\
        <div class="modal-body">\
        \
        </div>\
        </div>\
        </div>\
        </div>';
        $('body').append(modal);
        $('#custom_modal_resource').modal('show');
        $('#custom_modal_resource .modal-body').load(link);
      });

  </script>
  <script type="text/javascript">
    $(".udev").click(function(){
location.reload(true);
});

      </script>

  <!--
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
  -->


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

   