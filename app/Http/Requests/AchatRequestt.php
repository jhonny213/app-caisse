<?php

namespace Caisse\Http\Requests;

use Caisse\Agence;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
    //solde de compte
    public function rules()
    {

        $sold = Agence::where('id',Auth::user()->agence_id)->first();

        if ($this->request->get('machat') == 'caisse') {

            $max = $sold->caisse;
        }

        if ($this->request->get('machat') == 'banque') {
            $max = $sold->banque;
        }


        $prix = $this->request->get('prix');
        $maxQant = intval($max / $prix);

        return [
            'machat' => 'required|required_if:selection,banque|required_if:selection,caisse',
            'fourniture' =>'required',
            'fournisseur' =>'required',
            'prix' => "required|regex:/^\d{1,13}(\.\d{1,4})?$/|numeric|min:1|max:$max",
            'Quantite' => "required|numeric|min:1|max:$maxQant",
            'desc' => 'nullable',
        ];
    }
}
