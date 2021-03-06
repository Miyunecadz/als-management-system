<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreStudentRequest extends FormRequest
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
            'lastgrade' => 'required',
            'dropout' => 'required',
            'dropoutother' => 'required_if:dropout,Other',
            'attendedals' => 'required',
            'programname' => 'required_if:attendedals,Yes',
            'literacylevel' => 'required_if:attendedals,Yes',
            'yearattended' => 'required_if:attendedals,Yes',
            'completedprogram' => 'required_if:attendedals, Yes',
            'notcompletedreason' => 'required_if:completedprogram,No',
            'inkms' => 'required',
            'inhours' => 'required',
            'transportationtocenter' => 'required',
            'othertransportation' => 'required_if:transportationtocenter,Other',
        ];
    }
}
