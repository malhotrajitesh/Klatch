<?php

namespace App\Http\Requests;

use App\Jobcat;
use Gate;
use Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ujob_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'job_t' => [
                'required',
            ],
        ];
    }
}
