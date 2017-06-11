<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjouterAdminRequest extends FormRequest
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
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255|regex:/(.*)@esi-sba.dz/i|unique:administrateur',
            'password' => 'required|min:6|confirmed',
            'telephone' => 'required|max:255',
            'date_n' => 'required',
            'lieu_n' => 'required|max:255',
            'sexe' => 'required|max:255',
            'adresse' => 'required|max:255',
            'nom_fr' => 'required|max:255|regex:/^[a-zA-Z]+$/u',
            'prenom_fr' => 'required|max:255|regex:/^[a-zA-Z]+$/u',

        ];
    }
}
