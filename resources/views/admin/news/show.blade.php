@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('News') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.incomeNews.fields.id') }}
                        </th>
                        <td>
                            {{ $news->id }}
                        </td>
                    </tr>
                        <tr>
                        <th>
                            {{ trans('Category') }}
                        </th>
                        <td>
                            {{ $news->news_cat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Title') }}
                        </th>
                        <td>
                            {{ $news->nstitle }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('Details') }}
                        </th>
                        <td>
                            {{ $news->nsdetail }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('Url') }}
                        </th>
                        <td>
                            {{ $news->nslink }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('Pic') }}
                        </th>
                        <td>
                           
                             <img class="img-rounded" style="height:300px; width: auto;" src="{{ URL::asset("/public/image/news/".$news->nspic) }}" alt="no">
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