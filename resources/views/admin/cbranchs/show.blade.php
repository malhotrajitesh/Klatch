@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('Company Branch') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('ID') }}
                        </th>
                        <td>
                            {{ $cbranch->id }}
                        </td>
                    </tr>
                
                         <tr>
                        <th>
                            {{ trans('Name') }}
                        </th>
                        <td>
                            {{ $cbranch->name ?? '' }}
                        </td>
                    </tr>
                
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection