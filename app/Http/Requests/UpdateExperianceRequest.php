<?php

namespace App\Http\Requests;

use App\Experiance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateExperianceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('uedu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'exp_type' => [
                'required',
               
            ],
        ];
    }
}
