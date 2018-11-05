<?php

namespace Caisse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchatRequestt extends FormRequest
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
            'machat' => 'required|required_if:selection,banque|required_if:selection,caisse',
            'prix' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'validation' => 'required_if:selection,0|required_if:selection,1|required_if:selection,2',
            'desc' => 'nullable',
        ];
    }
}
