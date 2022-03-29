<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialIconRequest extends FormRequest
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
            'facebook'      => 'required|string',
            'twitter'       => 'nullable|string',
            'instagram'     => 'nullable|string',
            'linkedin'      => 'nullable|string',
            'is_active'     => 'required',
        ];
    }


    public function messages()
    {
        return [
            'facebook.required'     => 'Facebook must be String!',
            'facebook.string'       => 'Facebook must be String!',
            'twitter.string'        => 'Twitter must be String!',
            'instagram.string'      => 'Instagram must be String!',
            'linkedin.string'       => 'Linkedin must be String!',
            'is_active.required'    => 'Please select the tax status!',
        ];
    }


}
