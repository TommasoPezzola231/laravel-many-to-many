<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:50',
            'content' => 'required|min:5',
            'image' => 'url|max:255',
            'type_id' => 'exists:types,id'
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Il Titolo è obbligatorio!",
            "title.min" => "Devi inserire almeno :min Caratteri",
            "title.max" => "Puoi inserire un massimo di :max caratteri",

            "content.required" => "Il contenuto è obbligatorio!",
            "content.min" => "Devi inserire almeno :min caratteri",

            "image.max" => "Puoi inserire un massimo di :max caratteri",
            "image.url" => "Il link deve essere valido",
        ];
    }
}
