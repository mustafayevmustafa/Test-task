<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdoctRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'price' => 'nullable|numeric',
            'count' => 'nullable|numeric',
            'cost' => 'nullable|numeric',
        ];
    }
}
