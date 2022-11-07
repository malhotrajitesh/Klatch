<?php

namespace App\Http\Requests;

use App\Degree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDegreeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jobdegree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
