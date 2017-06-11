<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'nom' => 'required|max:50',
            'prenom' => 'required|max:50',
            'email' => 'required|email|max:50|regex:/(.*)@esi-sba.dz/i',
            'telephone' => 'required|digits:10',
            'date_n' => 'required',
            'lieu_n' => 'required|max:50',
            'adresse' => 'required|max:50',
            'nom_fr' => 'required|max:50|regex:/^[a-zA-Z_ ]+$/u',
            'prenom_fr' => 'required|max:50|regex:/^[a-zA-Z_ ]+$/u',


        ];
    }
}
