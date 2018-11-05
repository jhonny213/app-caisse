<?php

namespace Caisse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArreteRequest extends FormRequest
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
            '1da' => 'nullable|integer|between:0,1000000',
            '2da' => 'nullable|integer|between:0,1000000',
            '5da' => 'nullable|integer|between:0,1000000',
            '10da' => 'nullable|integer|between:0,1000000',
            '20da' => 'nullable|integer|between:0,1000000',
            '50da' => 'nullable|integer|between:0,1000000',
            '100da' => 'nullable|integer|between:0,1000000',
            '200da' => 'nullable|integer|between:0,1000000',
            '500da' => 'nullable|integer|between:0,1000000',
            '1000da' => 'nullable|integer|between:0,1000000',
            '2000da' => 'nullable|integer|between:0,1000000',
            'sold_achats' => 'nullable|integer|between:0,1000000',
        ];
    }
}
