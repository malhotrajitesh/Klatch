<?php

namespace App\Http\Requests;

use App\Adcat;
use Gate;
use Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAdcatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('a_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:ad_cat',
            ],
        ];
    }
}
