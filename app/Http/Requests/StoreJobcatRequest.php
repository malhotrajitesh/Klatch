<?php

namespace App\Http\Requests;

use App\Jobcat;
use Gate;
use Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJobcatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_cat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
