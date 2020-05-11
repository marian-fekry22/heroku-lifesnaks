<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country' => ['required', 'string', 'max:191', 'in:Egypt,egypt'],
            'governorate' => ['required', 'string', 'max:191', 'in:Cairo,cairo,Giza,giza'],
            'city' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:191'],
            'building' => ['nullable', 'string', 'max:191'],
            'floor' => ['nullable', 'string', 'max:191'],
            'apartment' => ['nullable', 'string', 'max:191'],
            'mobile' => ['required', 'string', 'max:191'],
            'landline' => ['nullable', 'string', 'max:191'],
            'payment_method_id'=> ['required', 'integer'],
        ];
    }

    public function messages($value='')
    {
        return [
            'country.in' => 'We only deliver to Egypt',
            'governorate.in' => 'We only deliver to Cairo & Giza',
        ];
    }
}
