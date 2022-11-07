@extends('layouts.admin')
@section('content')

 
 @include('partials._alert')
<div class="card">
	 <div class="card-header">
        {{ trans('All ') }} {{ trans('Tables in Your Database') }} <span class="badge badge-uva"> {{ $dbname}} </span> <span class="badge badge-uva"> {{ count($datas)}} </span> 
    
        <h5 style="float: right; color: blue; ">PHP Version {{ PHP_VERSION }}   &nbsp;      Laravel Version:- {{ App::VERSION() }}  </h5>
    </div>
   
    <div class="card-body">
    	<?php
         $uvadev ="Tables_in_".$dbname;
        ?>


    	 <div class="row">

                    @foreach($datas as $key => $data)
               
                	   
                               <span class="badge badge-uva">  <a class="badge-uva" href="{{ route('admin.dgenerates.gettstructure', $taname=$data->$uvadev) }}"> {{ $data->$uvadev ?? '' }}  </a></span> &nbsp; 
                          
               
                    @endforeach
            </div>
     </div>
 </div>

 <div class="card">
 <div class="card-header">
        {{ trans('Make ') }} {{ trans('New Table') }}
        <h5 style="float: right;">  {{ trans('Make ') }} {{ trans('Duplicate Table') }} </h5>
    </div>
        <div class="card-body">
    	  <div class="row">
                <div class="col-md-5">
        
 <form action="{{ route("admin.dgenerates.maketable") }}" method="POST" enctype="multipart/form-data" style="display: inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
            @csrf
           <div class="row">
            	<div class="col-md-10">
 <div class="form-group">
                <label for="name">{{ trans('Table Name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="table name should be in small caps like datas" value="" required>
            </div> </div>
<div class="col-md-2">
	
                <input class="btn btn-danger" type="submit" value="{{ trans('New Table') }}" style="margin-top: 24px;">
            
       </div>
        </div>
            </form>
 </div>
 <div class="col-md-1">
 </div>
                <div class="col-md-5">

            <form action="{{ route("admin.dgenerates.makeduptable") }}" method="POST" enctype="multipart/form-data" style="display: inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
            @csrf
           <div class="row">
                <div class="col-md-5">
 <div class="form-group">
                <label for="name">{{ trans('New Table Name') }}*</label>
                <input type="text" id="name" name="tname" class="form-control" placeholder="table name like datas" value="" required>
            </div> </div>
                        <div class="col-md-5">
 <div class="form-group">
                <label for="name">{{ trans('Old Table Name') }}*</label>
                <input type="text" id="name" name="oname" class="form-control" placeholder="Db Name.Table Name" value="" required>
            </div> </div>
<div class="col-md-2">
    
                <input class="btn btn-danger" type="submit" value="{{ trans('Clone Table') }}" style="margin-top: 24px;">
            </div>
        </div>
            </form>

</div>
</div>
    </div>
</div>

 <div class="card">
 <div class="card-header">
        {{ trans('Add ') }} {{ trans('Columan in Table') }}
    </div>
        <div class="card-body">
    	
        
 <form action="{{ route("admin.dgenerates.addfield") }}" method="POST" enctype="multipart/form-data" style="display: inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
            @csrf
            <div class="row">
            	<div class="col-md-3">
 <div class="form-group">
                <label for="name">{{ trans('Table Name') }}*</label>
                <input type="text" id="tname" name="name" class="form-control" placeholder="table name should be in small caps like datas" value="" required>
            </div> </div>
            	<div class="col-md-3">
 <div class="form-group">
                <label for="name">{{ trans('Coulmon Name') }}*</label>
                <input type="text" id="clmna" name="colname" class="form-control" placeholder="col name should be in small caps like mobile" value="" required>
            </div> </div>
            	<div class="col-md-2">
 <div class="form-group">
                <label for="name">{{ trans('Coolman Type') }}*</label>
                <input type="text" id="type" name="type" class="form-control" placeholder="in small string" value="" required>
            </div> </div>
            <div class="col-md-2">
 <div class="form-group">
                <label for="name">{{ trans('NUll') }}*</label>
                <input type="checkbox" id="type" name="nully" class="form-control"  value="->nullable">
            </div> </div>
<div class="col-md-2">
	
                <input class="btn btn-danger" type="submit" value="{{ trans('Add Coulman') }}" style="margin-top: 24px;">
            </div>
        </div>
            </form>
            
    </div>
</div>

@endsection
@section('scripts')
<style>
  .badge-uva {
  color: white;
  background-color : #ce440f; 
  font-size: medium;
  margin-top: 12px;
}
  </style>


@endsection