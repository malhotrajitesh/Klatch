<?php

namespace App\Http\Requests;

use App\Adscat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAdscatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sub_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ad_cat_id' => [
                'required',
            ],
            'name'     => [
                'required',
            ],
        ];
    }
}
