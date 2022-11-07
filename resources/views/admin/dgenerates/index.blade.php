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
                <input type="text" id="tname" name="name" class="form-control" placeholder="Copy Table name from Above" value="" required>
            </div> </div>
            	<div class="col-md-3">
 <div class="form-group">
                <label for="name">{{ trans('Coulmon Name') }}*</label>
                <input type="text" id="clmna" name="colname" class="form-control" placeholder="col name should be in small caps like mobile" value="" required>
            </div> </div>
            	<div class="col-md-2">
 <div class="form-group">
                <label for="name">{{ trans('Select Coolman Type') }}*</label>
                <select name="type" class="form-control select2" id="cars" required>
  <option value="string">VARCHAR</option>
  <option value="text">Text</option>
  <option value="date">Date</option>
  <option value="integer">Integer</option>
  <option value="dateTime">DateTime</option>
  <option value="json">Json</option>
  <option value="morphs">Morphs</option>
  <option value="softDeletes">SoftDeletes</option>
</select>           
            </div> </div>
            <div class="col-md-2">
 <div class="form-group">
                <label for="name">{{ trans('size') }}</label>
                <input type="text" id="type2" name="size" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" maxlength="3" placeholder="255 optional" value="">
            </div> </div>
<div class="col-md-2">
	
                <input class="btn btn-danger" type="submit" value="{{ trans('Add Coulman') }}" style="margin-top: 24px;">
            </div>
        </div>
            </form>
            
    </div>
</div>


<div class="card">
 <div class="card-header">
        {{ trans('Add ') }} {{ trans('Code Files Like Controller') }}
        <h5 style="float: right;">  {{ trans('Generate') }} {{ trans('Fake Data in Events') }} </h5>
    </div>
        <div class="card-body">
       <div class="row">
              <div class="col-md-6">
        
 <form action="{{ route("admin.dgenerates.makemodal") }}" method="POST" enctype="multipart/form-data" style="display: inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
            @csrf
            <div class="row">
              <div class="col-md-4">
 <div class="form-group">
                <label for="name">{{ trans('File Name') }}*</label>
                <input type="text" id="tname" name="fname" class="form-control" placeholder="MOdel ..etc" value="" required>
            </div> </div> 
              <div class="col-md-4">
 <div class="form-group">
                <label for="name">{{ trans('Select File Type') }}*</label>
                <select name="ftype" class="form-control select2" id="cars" required>
  <option value="make:model">Modal</option>
  <option value="make:controller">Controller</option>
  <option value="make:mail">Mail</option>
  <option value="make:notification">Notification</option>
  <option value="make:resource">Resource</option>
  <option value="make:factory">Factory</option>
</select>           
            </div> </div>

<div class="col-md-2">
  
                <input class="btn btn-danger" type="submit" value="{{ trans('Add Files') }}" style="margin-top: 24px;">
            </div>
        </div>
            </form>
          </div>

<div class="col-md-6">
            <form action="{{ route("admin.dgenerates.genfake") }}" method="POST" enctype="multipart/form-data" style="display: inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
            @csrf
            <div class="row">
              <div class="col-md-6">
 <div class="form-group">
                <label for="name">{{ trans('Total Records in numbers') }}*</label>
                <input type="text" id="t" name="tqty" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Only Numbers like 1000" value="" maxlength="10" required>
            </div> </div> 


<div class="col-md-4">
  
                <input class="btn btn-danger" type="submit" value="{{ trans('Add Records') }}" style="margin-top: 24px;">
            </div>
        </div>
            </form>
            </div>
          </div>
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