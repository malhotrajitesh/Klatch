<?php

namespace App\Http\Requests;

use App\Cbranch;
use Gate;
use Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCbranchRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:cbranchs',
            ],
        ];
    }
}
