<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => 'required',
            'report_type_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'state_id' => 'required',
            'victim' => 'required',
            'affiliation' => 'required',
            'assailant' => 'required',
            'date' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'Id is required.',
            'report_type_id.required' => 'Report type is required.',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'state_id.required' => 'State is required',
            'victim.required' => 'Victim is required',
            'affiliation.required' => 'Affiliation is required',
            'assailant.required' => 'Assailant is required',
            'date.required' => 'Date is required'
        ];
    }
}
