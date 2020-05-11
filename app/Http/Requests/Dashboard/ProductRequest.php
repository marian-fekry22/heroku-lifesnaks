<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191|unique:products,name,'.$this->product,
            'description' => 'required|string',
            'price' => 'required|numeric',
        ];
    }
}
