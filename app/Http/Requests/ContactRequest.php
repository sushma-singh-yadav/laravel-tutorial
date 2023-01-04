<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //
            'input_name' => 'required|min:3',
            'input_email' => 'required|email',
            'input_phone' => 'required|digits:10',
            'input_image' => 'required|mimes:jpg,png,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'input_name.required' => 'Name field is required',
            'input_name.min' => 'Name field should have min 3 letters',
            'input_email.required' => 'Email field is required',
            'input_email.email' => 'Email field should ahve valid email',
            'input_phone.required' => 'Phone field is required',
            'input_phone.digits' => 'Phone field should have 10 digits',
            'input_image.required' => 'Image field is required',
            'input_phone.mimes' => 'Image should have extension jpg,png, jpeg',
        ];
    }
}
