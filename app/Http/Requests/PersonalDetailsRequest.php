<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class PersonalDetailsRequest extends FormRequest
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
            'enroldate' => 'required|date|before_or_equal:today',
            'lastname' => 'required|max:255',
            'firstname' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'birthday' => 'required|date|before:today',
            'birthplace' => 'required',
            'sex' => 'required',
            'civilstatus' => 'required',
            'pwd' => 'required',
            'religion' => 'required',
            'mothertongue' => 'required',
            'flastname' => 'required',
            'ffirstname'=> 'required',
            'fmiddlename' => 'required',
            'foccupation' => 'required',
            'mlastname' => 'required',
            'mfirstname' => 'required',
            'mmiddlename' => 'required',
            'moccupation' => 'required'
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
