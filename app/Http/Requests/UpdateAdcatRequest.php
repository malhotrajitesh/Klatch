<?php

namespace App\Http\Requests;

use App\Adcat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAdcatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('a_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
