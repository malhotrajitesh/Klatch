@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('No Need') }}
            <a style="float: right;" class="btn btn-success" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
       
    </div>

    <div class="card-body">
       
         <form action="{{ route("admin.pages.uploadban") }}" method="POST" enctype="multipart/form-data" style="display:inline; ">
            @csrf
<div class="row">

    <div class ="col-md-6">
               <div class="input-group mb-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-atom"></i>&nbsp;Upload Banner</span>
                            </div>
                            <input type="file" id="image" class="form-control" name="ubanner" value="">
                            <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 150px;  max-width: 150px; display: none; float: right;">
                                                      </div></div>
        <div class ="col-md-6">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
</div>
  </form>
</div>
&nbsp;
<div class="container">
    <header class="main-header clearfix">
    
      <h1 class="name">3D BANNER</h1>
    </header>

    <div class="content clearfix">

   

         @foreach($datab as $path)

            <div class="cube-container">
        <div class="photo-cube">

          <img class="front"src="{{ URL::asset($path)  }}" alt="">
          <div class="back photo-desc">
           <h3>    <form action="{{ route('admin.pages.bandelete') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                        <input type="hidden" name="iname" value="{{ $path  }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xl btn-danger" value="{{ trans('global.delete') }}">
                                    </form> </h3>
           
          </div>
          <img class="left" src="{{ URL::asset($path)  }}" alt="">
          <img class="right" src="{{ URL::asset($path)  }}" alt="">

        </div>
      </div>  

 
@endforeach


    </div>
  </div>

   


    </div>
</div>
@endsection

@section('scripts')
@parent

<style type="text/css">
body {
  font: 1em/1.5 'Open Sans', sans-serif;
  color: #373737;
  background: #eaeaea;

  margin: 0;
}
a {
  text-decoration: none;
}
h1,
h2,
h3 {
  color: #282828;
  text-transform: uppercase;
}
h2 {
  font-size: 1.125em;
  color: #4a89ca;
  font-weight: 600;
  margin: 0;
}
h3 {
  font-size: 1.3em;
  line-height: 1.25em;
  margin-top: .85em;
  margin-bottom: .5em;
}
p {
  font-size: .875em;
  line-height: 1.4;
  margin: 0 0 1.5em;
}

/* ================================= 
  Base Layout Styles
==================================== */

/* ---- Layout Containers ---- */

.container,
.content {
  margin: auto;
}
/*.container {
  width: 94.02985075%;
  max-width: 1260px;
  padding: 0 2.25em 4em;
  background: #fff;
   background-image: radial-gradient(red, yellow, green);
}*/
.main-header {
  text-align: center;
}
.cube-container {
  max-width: 200px;
  text-align: center;
  margin: 0 auto 4.5em;
}
/* ---- Page Elements ---- */

.name {
  font-size: 1.65em;
  font-weight: 800;
  margin: 0 0 1.5em;
  line-height: 1;
}
.name span {
  font-weight: 300;
  margin-left: -7px;
}
.logo {
  width: 45px;
  margin-bottom: .4em;
  cursor: pointer;
}
.button {
  font-size: .8em;
  color: #fff;
  width: 90%;
  line-height: 1.15;
  font-weight: 700;
  display: block;
  text-decoration: none;
  text-transform: uppercase;
  padding: .95em 0;
  border-radius: .5em;
  background: rgba(74,137,202, .8);
  margin: auto;
}
/* ---- Photo Overlay ---- */

.photo-desc {
  font-size: .85em;
  color: #fff;
  padding: 1.1em 1em 0;
  background: #345d88;
}
/* ---- Float clearfix ---- */

.clearfix::after {
  content: " ";
  display: table;
  clear: both;
}

/* ================================= 
  Media Queries
==================================== */

@media (min-width: 769px) {
  .cube-container {
    float: left;
    margin-left: 16.6%;
  }
}
@media (min-width: 1025px) {
  .cube-container:first-child {
    margin-left: 0;
  }
 
  .content {
    max-width: 900px;
    margin: auto;
  }
}

/* ================================= 
  Button Transitions
==================================== */

.button {
  transition: background .3s;
}
.button:hover {
  background: rgba(74,137,202, 1);
}

/* ================================= 
  Photo 3D Transforms & Transitions
==================================== */

.cube-container {
  /*box-shadow: 0 18px 40px 5px rgba(74,0,255,.4);*/
  perspective: 800px;
}

.photo-cube {
transition: transform 2s ease-in-out; 
  width: 220px;
  height: 200px;
  transform-style: preserve-3d;
}

.photo-cube:hover {
transform: rotateY(-270deg);
}

.front,
.back,
.left,
.right {
width: 100%;
height: 100%;
display: block;
position: absolute;
}

.front {
transform: translate3d(0,0,110px);
}

.back {
transform: translateZ(-110px) rotateY(270deg);
  transform-origin: center left;
}

.left {
transform: rotateY(-270deg) translate3d(110px, 0, 0);
  transform-origin: top right;
}

.right {
transform: translateZ(-110px) rotateY(180deg);
 }
</style>
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
 @endsection