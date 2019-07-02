<?php

namespace App\Http\Requests\Story;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
            'author' => 'required',
            'title' => 'required',
            'story' => 'required',
            'tags' => 'required',
            'thumbnail' => 'required|image|max:1999',
            'report_id' => 'required',
            'status_id' => 'required'
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
          'author.required' => 'Author is required.',
          'title.required' => 'Title is required',
          'story.required' => 'Story is required',
          'tags.required' => 'Tags is required',
          'thumbnail.required' => 'Thumbnail is required',
          'report_id.required' => 'Report is required',
          'status_id.required' => 'Status is required'
        ];
    }
}
