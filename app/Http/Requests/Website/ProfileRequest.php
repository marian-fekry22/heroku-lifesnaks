<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'country' => ['required', 'string', 'max:191'],
            'governorate' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:191'],
            'building' => ['nullable', 'string', 'max:191'],
            'floor' => ['nullable', 'string', 'max:191'],
            'apartment' => ['nullable', 'string', 'max:191'],
            'mobile' => ['required', 'string', 'max:191'],
            'landline' => ['nullable', 'string', 'max:191'],
        ];
        if ($this->method() === 'POST') {
            $rules['name'] = ['required', 'string', 'max:191'];
            $rules['email'] = ['required', 'string', 'email', 'max:191', 'unique:users'];
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }
        return $rules;
    }
}
