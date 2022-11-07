<?php

namespace App\Http\Requests;

use App\Education;
use Gate;
use Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEducationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('uedu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'degree_name' => [
                'required',
                'unique:educations,created_by_id',
            ],

        ];
    }
}
