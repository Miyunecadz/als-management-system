<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class EducationalInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lastgrade' => 'required',
            'dropoutother' => 'required_if:dropout,Other',
            'attendedals' => 'required',
            'programname' => 'required_if:attendedals,Yes',
            'literacylevel' => 'required_if:attendedals,Yes',
            'yearattended' => 'required_if:attendedals,Yes',
            'completedprogram' => 'required_if:attendedals, Yes',
            'notcompletedreason' => 'required_if:completedprogram,No'
        ];
    }

    protected function failedValidation($validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['validated' => false, 'errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
