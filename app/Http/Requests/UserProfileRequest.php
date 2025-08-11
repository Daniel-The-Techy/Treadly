<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Username'=>'required|string',
            'Bio'=>'required',
            'About'=>'required',
            'contact'=>'required',
             'Photo'=>'required',
             'skills'=>'required',
             'Profession'=>'required',
             'Country'=>'required',
              'Cover_image'=>'required'
        ];
    }
}
