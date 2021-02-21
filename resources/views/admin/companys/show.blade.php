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
        {{ trans('global.show') }} {{ trans('cruds.company.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.id') }}
                        </th>
                        <td>
                            {{ $company->id }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.name') }}
                        </th>
                        <td>
                            {{ $company->cmname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.logo') }}
                        </th>
                        <td>
                          <img class="img-rounded" style="height:100px; width: 100px;" src="{{ URL::asset("/public/image/".$company->logo) }}" alt="no">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.cid') }}
                        </th>
                        <td>
                            {{ $company->cid }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.company.fields.gst') }}
                        </th>
                        <td>
                            {{ $company->gst ?? '' }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.company.fields.invoice') }}
                        </th>
                        <td>
                            {{ $company->invoice ?? '' }}
                        </td>
                    </tr>
                       <tr>
                        <th>
                            {{ trans('cruds.company.fields.address') }}
                        </th>
                        <td>
                            {{ $company->address ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                            {{ trans('cruds.company.fields.pincode') }}
                        </th>
                        <td>
                            {{ $company->pincode ?? '' }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.company.fields.city') }}
                        </th>
                        <td>
                            {{ $company->city ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.state') }}
                        </th>
                        <td>
                            {{ $company->state ?? '' }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.company.fields.country') }}
                        </th>
                        <td>
                            {{ $company->country ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                            {{ trans('cruds.company.fields.contact_no') }}
                        </th>
                        <td>
                            {{ $company->contact_no ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                            {{ trans('cruds.company.fields.alt_no') }}
                        </th>
                        <td>
                            {{ $company->alt_no ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                            {{ trans('cruds.company.fields.ref_no') }}
                        </th>
                        <td>
                            {{ $company->ref_no ?? '' }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.company.fields.email') }}
                        </th>
                        <td>
                            {{ $company->email ?? '' }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.company.fields.date') }}
                        </th>
                        <td>
                            {{ $company->date ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--<a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>-->
        </div>


    </div>
</div>
@endsection