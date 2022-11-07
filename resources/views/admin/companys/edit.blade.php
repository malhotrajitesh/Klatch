@extends('layouts.admin')
@section('content')
  <!-- <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>-->
<div style="margin-bottom: 10px;" class="row">
        <div class="col-md-2">
            <a class="btn btn-success" href="{{ route("admin.companys.index") }}">
                {{ trans('Back') }}
            </a>
        </div>
</div>
<div class="card">
    <div class="card-header"><i class="fa-fw fas fa-tasks nav-icon" style="color:#000;"></i>
        {{ trans('global.edit') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.companys.update", [$company->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          

           <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.company.fields.name') }}*</label>
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
                    <div class="form-group">

                        <input type="file" name="image" placeholder="Choose image" id="image" value="{{ old('logo', isset($company) ? $company->logo : '') }}">
                       
                    <img id="image_preview_container"   src="{{ URL::asset("/public/image/".$company->logo) }}"alt="preview image" style="max-height: 150px;  float: right;">
              
            
                  
                    </div>
                </div>
              
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('cid') ? 'has-error' : '' }}">
                        <label for="cid">{{ trans('cruds.company.fields.cid') }}*</label>
                        <input type="text" id="cid" name="cid" class="form-control" value="{{ old('cid', isset($company) ? $company->cid : '') }}" required>
                        @if($errors->has('cid'))
                            <em class="invalid-feedback">
                                {{ $errors->first('cid') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.cid_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('gst') ? 'has-error' : '' }}">
                        <label for="gst">{{ trans('cruds.company.fields.gst') }}*</label>
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
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('invoice') ? 'has-error' : '' }}">
                        <label for="invoice">{{ trans('cruds.company.fields.invoice') }}*</label>
                        <input type="text" id="invoice" name="invoice" class="form-control" value="{{ old('invoice', isset($company) ? $company->invoice : '') }}" required>
                        @if($errors->has('invoice'))
                            <em class="invalid-feedback">
                                {{ $errors->first('invoice') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.invoice_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
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
                <div class="col-md-4">
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

                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                        <label for="city">{{ trans('cruds.company.fields.city') }}</label>
                        <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($company) ? $company->city : '') }}">
                        @if($errors->has('city'))
                            <em class="invalid-feedback">
                                {{ $errors->first('city') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.city_helper') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4">

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
                <div class="col-md-4">
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
                <div class="col-md-4">
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
                <div class="col-md-4">
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

                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('ref_no') ? 'has-error' : '' }}">
                        <label for="ref_no">{{ trans('cruds.company.fields.ref_no') }}</label>
                        <input type="text" id="ref_no" name="ref_no" class="form-control" value="{{ old('ref_no', isset($company) ? $company->ref_no : '') }}">
                        @if($errors->has('ref_no'))
                            <em class="invalid-feedback">
                                {{ $errors->first('ref_no') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.ref_no_helper') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                        <label for="date">{{ trans('cruds.company.fields.date') }}*</label>
                        <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($company) ? $company->date : '') }}" required>
                        @if($errors->has('date'))
                            <em class="invalid-feedback">
                                {{ $errors->first('date') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.company.fields.date_helper') }}
                        </p>
                    </div>
                </div>
          
          <input type="hidden" name="created_by_id" value="{{Auth::user()->id}}">
          
          <div class="col-md-4">
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>
    </div>
        </form>


    </div>
</div>
   <!--<a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>-->
@endsection