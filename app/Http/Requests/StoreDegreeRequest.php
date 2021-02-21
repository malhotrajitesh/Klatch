<?php

namespace App\Http\Requests;

use App\Degree;
use Gate;
use Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDegreeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jobdegree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:degrees',
            ],
        ];
    }
}
