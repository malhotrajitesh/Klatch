<?php

namespace App\Http\Requests;

use App\Education;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEducationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('uedu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
