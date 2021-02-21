@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
        <div class="col-md-2">
            <a class="btn btn-success" href="{{ route("admin.companys.index") }}">
                {{ trans('Back') }}
            </a>
        </div>
    
    </div>


<div class="card">
    <div class="card-header"><i class="fa-fw fas fa-tasks nav-icon" style="color:#000;"></i>
        {{ trans('global.create') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        
        <form action="{{ route("admin.companys.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
         
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('Company Name') }}*</label>
                        <input type="text" id="cmname" name="cmname" class="form-control" value="{{ old('cmname', isset($company) ? $company->cmname : '') }}" required>
                        @if($errors->has('cmname'))
                            <em class="invalid-feedback">
                                {{ $errors->first('cmname') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.name_helper') }}
                        </p>

                    </div>
                </div>

                   <div class="col-md-4">
                    <div class="form-group {{ $errors->has('cpname') ? 'has-error' : '' }}">
                        <label for="cpname">{{ trans('Contact Person Name') }}</label>
                        <input type="text" id="cpname" name="cpname" class="form-control" value="{{ old('cpname', isset($company) ? $company->cpname : '') }}" required>
                        @if($errors->has('cpname'))
                            <em class="invalid-feedback">
                                {{ $errors->first('cpname') }}
                            </em>
                        @endif
                      
                    </div>
                </div>

                     <div class="col-md-4">
                    <div class="form-group {{ $errors->has('gst') ? 'has-error' : '' }}">
                        <label for="gst">{{ trans('cruds.company.fields.gst') }}</label>
                        <input type="text" id="gst" name="gst" class="form-control" value="{{ old('gst', isset($company) ? $company->gst : '') }}" required>
                        @if($errors->has('gst'))
                            <em class="invalid-feedback">
                                {{ $errors->first('gst') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.gst_helper') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
    <label>Branches
  <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span>
    </label>

            <select name="cbranchs[]" id="cbranchs" class="form-control select2" multiple="multiple" required>
                @foreach($cbranchs as $id => $cbranchs)
                <option value="{{ $id }}" >{{ $cbranchs }}</option>
                @endforeach
            </select>
   
</div>

<div class="col-md-3">
    <label>PAN number:</label>
    <input type="text" class="form-control" id="uva_pan" name="pan_nmber">
</div>


   <div class="col-md-3">         
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.company.fields.email') }}</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($company) ? $company->email : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.email_helper') }}
                </p>
            </div>
        </div>


                
                      
                        
             

             
           
            
                <div class="col-md-3">
                      <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address">{{ trans('cruds.company.fields.address') }}*</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($company) ? $company->address : '') }}" required>
                        @if($errors->has('address'))
                            <em class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.address_helper') }}
                        </p>
                       </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
                        <label for="pincode">{{ trans('cruds.company.fields.pincode') }}*</label>
                        <input type="text" id="pincode" name="pincode" class="form-control" value="{{ old('pincode', isset($company) ? $company->pincode : '') }}" required>
                        @if($errors->has('pincode'))
                            <em class="invalid-feedback">
                                {{ $errors->first('pincode') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.pincode_helper') }}
                        </p>

                    </div>
                </div>

      



            <div class="col-md-3">
                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                    <label for="state">{{ trans('cruds.company.fields.state') }}</label>
                    <input type="text" id="state" name="state" class="form-control" value="{{ old('state', isset($company) ? $company->state : '') }}">
                    @if($errors->has('state'))
                        <em class="invalid-feedback">
                            {{ $errors->first('state') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.company.fields.state_helper') }}
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <label for="country">{{ trans('cruds.company.fields.country') }}*</label>
                    <input type="text" id="country" name="country" class="form-control" value="{{ old('country', isset($company) ? $company->country : '') }}" required>
                    @if($errors->has('country'))
                        <em class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.company.fields.country_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                    <label for="email">{{ trans('cruds.company.fields.contact_no') }}</label>
                    <input type="text" id="vechile" name="contact_no" class="form-control" value="{{ old('email', isset($company) ? $company->contact_no : '') }}">
                    @if($errors->has('contact_no'))
                        <em class="invalid-feedback">
                            {{ $errors->first('contact_no') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.company.fields.contact_no_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                  <div class="form-group {{ $errors->has('alt_no') ? 'has-error' : '' }}">
                    <label for="alt_no">{{ trans('cruds.company.fields.alt_no') }}</label>
                    <input type="text" id="alt_no" name="alt_no" class="form-control" value="{{ old('alt_no', isset($company) ? $company->alt_no : '') }}">
                    @if($errors->has('alt_no'))
                        <em class="invalid-feedback">
                            {{ $errors->first('alt_no') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.company.fields.alt_no_helper') }}
                    </p>
                </div>
            </div>

         


                   <div class="col-sm-3">
     <label>Logo*:</label>
      <input type="file" name="logo" required placeholder="Choose image" id="image" value="">
                           
                        <img id="image_preview_container"   src=""
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">
    
</div>

<div class="col-sm-3">
     <label>Incorporation certificate*:</label>
      <input type="file" name="inco_cert"  required placeholder="Choose image" id="image2" value="">
                           
                        <img id="image_preview_container2"   src=""
                            alt="preview image" style="max-height: 113px;  max-width: 113px; display: none; float: right;">
    
</div>
          
          <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
          
           
            <div class="col-md-4">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>
        </form>


</div>
@endsection


@section('scripts')
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
