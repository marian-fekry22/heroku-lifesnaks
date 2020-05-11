<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PromoCodeRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191|unique:promo_codes,name,'.$this->promo_code,
            'discount_percentage' => 'required|integer|between:1,100',
            'is_active' => 'required|boolean',
            'expires_in' => 'date_format:Y-m-d',
        ];
    }
}
