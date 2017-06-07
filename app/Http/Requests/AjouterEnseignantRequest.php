<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjouterEnseignantRequest extends FormRequest
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
            'sec_s' => 'required|max:255|unique:enseignant',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255|regex:/(.*)@esi-sba.dz/i|unique:enseignant',
            'telephone' => 'required|max:255',
            'date_n' => 'required',
            'lieu_n' => 'required|max:255',
            'sexe' => 'required|max:255',
            'adresse' => 'required|max:255',
            'nom_fr' => 'required|max:255',
            'prenom_fr' => 'required|max:255',
        ];
    }
}
