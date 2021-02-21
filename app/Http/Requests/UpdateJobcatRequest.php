<?php

namespace App\Http\Requests;

use App\Jobcat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateJobcatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_cat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:job_cat',
            ],
        ];
    }
}
