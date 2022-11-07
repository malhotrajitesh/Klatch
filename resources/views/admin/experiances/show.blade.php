@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('experiance Details') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.incomeCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $experiance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('College') }}
                        </th>
                        <td>
                            {{ $experiance->college }}
                        </td>
                    </tr>
                       <tr>
                        <th>
                            {{ trans('Degree Name') }}
                        </th>
                        <td>
                            {{ $experiance->degree_name ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                          {{ trans('Field Of Study') }}
                        </th>
                        <td>
                            {{ $experiance->fos ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                           {{ trans('Location') }}
                        </th>
                        <td>
                             {{ $experiance->uplace ?? '' }}
                        </td>
                    </tr>
                       <tr>
                        <th>
                           {{ trans('Total No') }}
                        </th>
                        <td>
                             {{ $experiance->total_no ?? '' }}
                        </td>
                          <th>
                           {{ trans('Obtained No') }}
                        </th>
                        <td>
                             {{ $experiance->get_no ?? '' }}
                        </td>
                    </tr>
                    
                         <tr>
                        <th>
                           {{ trans('From') }}
                        </th>
                        <td>
                             {{ $experiance->e_from ?? '' }}
                        </td>
                          <th>
                           {{ trans('To') }}
                        </th>
                        <td>
                             {{ $experiance->e_to ?? '' }}
                        </td>
                    </tr>
             
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection