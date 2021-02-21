  @extends('layouts.admin')
  @section('content')
  @include('partials._follow_me')

      <div style="margin-bottom: 10px;" class="row">
      
  

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
          {{ trans('Follow Me') }} {{ trans('Here :-') }}
      </div>
      @include('partials._alert')


      <div class="card-body" style="background-color: #CAD1C9;">


  <div class="row">
  @if(count($follows) > 0)
                          @foreach ($follows as $follow)


              <div class="col-lg-8" style="background-color: white;">
                          <div class="item-box-blog">
                            <div class="row" style="background-color: #0EDB60; border-radius: 5px; margin-top: -10px;">
                              <div class="col-sm-2">

                             <img class="p-0 profilepicture rounded-circle" style="width:80px; height: 100px; float: left; " src="{{ URL::asset("/public/image/".$follow->user_by->propic ?? '') }}"> 
                           </div>
                           <div class="col-sm-10">
                           <h1 style="float: left; word-wrap: break-word;"><a href="#" style="color: white;" > {{$follow->user_by->name }} </a> </h5><br>&nbsp;
                            <p style="float: left; position: absolute; color: white;"> {{$follow->created_at->diffForHumans() }} </p>
                          </div>
                        </div>


                                <div class="item-box-blog-body">

                              <!--Heading-->
                              <div class="item-box-blog-heading">
                                <a href="{{route('admin.follows.show',$follow->id)}}" tabindex="0">
                                  <h5>{{$follow->so_title ?? ''}}</h5>
                                </a>
                              </div>
                              <!--Data-->
                              <div class="item-box-blog-data" style="padding: px 15px;">
                                <p><i class="fa fa-user-o"></i> {{$follow->so_desc  ?? ''}}, <i class="fa fa-comments-o"></i> </p>
                              </div>
                              <!--Text-->
                              <div class="item-box-blog-text">
                                <span class="glyphicon glyphicon-tags">
                                   <i class="fa fa-tags icon"></i>
                                @foreach($follow->tags as $tag)
                 <a href="{{ route('admin.applyfollows.tagfollow', $tag->name) }}" target="_blank"> <label class="label label-info">#{{ $tag->name }}</label> </a>
                  @endforeach</span>
                              </div>
                            </div>
                            <div class="item-box-blog-image">

                  
              <div class="row blog">
                  <div class="col-md-12">
                      <div id="blogCarousel{{ $follow->id ?? ''}}" class="carousel slide" data-ride="carousel">

                          <ol class="carousel-indicators">
                              <li data-target="#blogCarousel{{ $follow->id ?? ''}}" data-slide-to="0" class="active"></li>
                              <li data-target="#blogCarousel{{ $follow->id ?? ''}}" data-slide-to="1"></li>
                              <li data-target="#blogCarousel{{ $follow->id ?? ''}}" data-slide-to="2"></li>
                              <li data-target="#blogCarousel{{ $follow->id ?? ''}}" data-slide-to="3"></li>
                              <li data-target="#blogCarousel{{ $follow->id ?? ''}}" data-slide-to="4"></li>
                          </ol>

                          <!-- Carousel items -->
                          <div class="carousel-inner">

                              <div class="carousel-item active">
                                <figure> 
                                  @if(pathinfo($follow->so_imga, PATHINFO_EXTENSION) == 'mp4')
                                        <video style="height: 280px; min-width: 100%;"   controls>
      <source   src="{{ URL::asset("/public/image/uvafollow/".$follow->so_imga ?? '') }}">
    Your browser does not support the video tag.
</video>
@else
                                  <img alt="" src="{{URL::asset("/public/image/uvafollow/".$follow->so_imga ?? '') }}">
@endif
                                    </figure>
                              </div>
                              <!--.item-->

                              <div class="carousel-item">
                                <figure> <img alt="" src="{{URL::asset("/public/image/uvafollow/".$follow->so_imgb ?? '') }}">  </figure>
                                 
                              </div>
                                <div class="carousel-item">
                                <figure> <img alt="" src="{{URL::asset("/public/image/uvafollow/".$follow->so_imgc ?? '') }}">  </figure>
                                 
                              </div>
                                <div class="carousel-item">
                                <figure> <img alt="" src="{{URL::asset("/public/image/uvafollow/".$follow->so_imgd ?? '') }}">  </figure>
                                 
                              </div>
                                <div class="carousel-item">
                                <figure> <img alt="" src="{{URL::asset("/public/image/uvafollow/".$follow->so_imge ?? '') }}">  </figure>
                                 
                              </div>
                              <!--.item-->

                          </div>
                          <!--.carousel-inner-->
                      </div>
                    </div>
                  </div>
               </div>
                    
                    <span style="float: left; color: #0EDB60;"> {{ $follow->alikcount() }} Likes</span>&nbsp;
                         
                      <span style="float: right; color: #0EDB60;"> {{ $follow->cmntcount() }} Comments</span>&nbsp;
                             <hr>
                             
                     <div class ="row" style="text-align: center;">
                      <div class="col-sm-4">
                         <a class="uvalike" href="javascript:void(0)"  data-mycheckbox="{{ $follow->id ?? '' }}">
                      @if($follow->likecount() == 0)
                     <i id="uva{{ $follow->id ?? '' }}" class="far fa-thumbs-up" style="color: #0EDB60;"></i> 
                     @else
                      <i id="u" class="far fa-thumbs-up" style="color: red;"></i> 
                      @endif
                    </a>Like

                      </div>
                      <div class="col-sm-4">
                         <a  href="javascript:void(0)"  class="devtrick" data-mycheckbox="{{$follow->id ?? '' }}">
                        <i class="far fa-comment-alt" style="color: #0EDB60;"></i> 
                      </a>Comments

                          
                        


                      </div>
                      <div class="col-sm-4">
                        <i class="fas fa-share" style="color: #0EDB60;"></i> Share
                      </div>
                    </div>

                   <hr>
                     <form method="post" action="{{ route('admin.comment.add') }}">
                          @csrf
                          <div class="form-group">
                              <input type="text" name="comment_body" class="form-control" placeholder="Write a comment..." />
                              <input type="hidden" name="follow_id" value="{{ $follow->id ?? '' }}" />
                          </div>
                          <div class="form-group">
                              <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"
         tabindex="-1" />
                          </div>
                      </form>
                        <hr>
                <div id="dev{{$follow->id ?? '' }}" style="display: none;">  
                 @include('partials._comment_replies', ['comments' => $follow->comments, 'follow_id' => $follow->id])
   </div>

                              
                            </div>
                          </div>
                       &nbsp;

         @endforeach
                         
                      @else 
                        <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
                      @endif
                    </div>
  </div>
  </div>


  @endsection
  @section('scripts')
   

  @parent
  <style>
      .display-comment .display-comment {
          margin-left: 40px
      }
  </style>
  <style>
    .form-control {
    
    
    border: 2px solid #0EDB60;
    border-radius: 20px;
  }

    </style>
  <style>
  .blog .carousel-indicators {
    left: 0;
    top: auto;
      bottom: -40px;

  }

  /* The colour of the indicators   carousel css*/
  .blog .carousel-indicators li {
      background: #788277;
      border-radius: 50%;
      width: 15px;
      height: 2px;
      margin-bottom: 12px;
  }

  .blog .carousel-indicators .active {
  background:  #0EDB60;
  }

    </style>



  <style>
   hr{ 
       background-color: #0EDB60;
    }

  .col-lg-8{
      padding-bottom:10px;
      margin-block-end: 30px;
     
      border: 10px solid #0EDB60;
      border-radius: 10px;
  }

  .white {
    color: #fff !important;
  }
  .mt{float: left;margin-top: -20px;padding-top: 20px;}
  .bg-blue-ui {
    background-color: #708198 !important;
  }
  figure img{width:300px; height:280px;}

  #blogCarousel {
    padding-bottom: 100px;
  }

  .item-box-blog {
    /* border: 5px solid #0EDB60; 
    border-radius: 10px; 
    text-align: center;*/
    z-index: 4;
   
  }

  .item-box-blog-image {
    position: relative;
  }

  .item-box-blog-image figure img {
    width: 100%;
    border-radius: 10px;
    
  }

  .item-box-blog-date {
    position: absolute;
    z-index: 5;
    padding: 4px 20px;
    top: -20px;
    right: 8px;
    background-color: #41cb52;
  }

  .item-box-blog-heart {
    position: absolute;
    z-index: 5;
    padding: 4px 20px;
    top: -20px;
    left: 8px;
    background-color: #41cb52;
  }

  .item-box-blog-date span {
    color: #fff;
    display: block;
    text-align: center;
    line-height: 1.2;
  }

  .item-box-blog-date span.mon {
    font-size: 18px;
  }

  .item-box-blog-date span.day {
    font-size: 16px;
  }

  .item-box-blog-body {
    padding: 10px;
  }

  .item-heading-blog a h5 {
    margin: 0;
    line-height: 1;
    text-decoration:none;
    transition: color 0.3s;
  }

  .item-box-blog-heading a {
      text-decoration: none;
  }

  .item-box-blog-data p {
    font-size: 13px;
  }

  .item-box-blog-data p i {
    font-size: 12px;
  }

  .item-box-blog-text {
    max-height: 100px;
    overflow: hidden;
  }

  .mt-10 {
    float: left;
    margin-top: -10px;
    padding-top: 10px;
  }

  .btn.bg-blue-ui.white.read {
    cursor: pointer;
    padding: 4px 20px;
    float: left;
    margin-top: 10px;
  }

  .btn.bg-blue-ui.white.read:hover {
    box-shadow: 0px 5px 15px inset #4d5f77;
  }

    </style>


  <script>

   $(".devtrick").click(function(event) {

      var iduva = $(this).data('mycheckbox');

        
  $('#dev'+iduva).toggle('slide');
    
  });

  </script>

  <script>

   $(".drep").click(function(event) {

      var iduvab = $(this).data('mycheckbox');

        
  $('#replyu'+iduvab).toggle('slide');
    
  });

  </script>

  <script>

   $(".drepa").click(function(event) {

      var iduvaa = $(this).data('mycheckbox');

        
  $('#replyua'+iduvaa).toggle('slide');
    
  });

  </script>




  <script>
   $(".uvalike").click(function(event) {
      var identifier = $(this).data('mycheckbox');
      var input_identifier = "#uva" + identifier; 
       

    if(identifier != '')
    {

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
     $.ajax({
      

       
      url:"{{ route('admin.follows.likeme') }}",
      method:"POST",
       
       dataType: 'json',
      data:{follow:identifier},
      success:function(data)
      {
     
      if (data == 1) {

       $(input_identifier).css("color", "red");
      
     } else {
       $(input_identifier).css("color", "#0EDB60");
      
     }
      }
     });
    }
    else
    {
     alert("Contact Developer");
    
    }
  });




  </script>

  @endsection