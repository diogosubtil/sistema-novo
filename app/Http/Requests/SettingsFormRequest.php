<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsFormRequest extends FormRequest
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
            'name' => ['required'],
            'color_primary' => ['required'],
            'color_secondary' => ['required'],
            'color_menu' => ['required'],
            'color_menu_letter' => ['required'],
            'color_menu_letter_active' => ['required'],
            'color_menu_title' => ['required'],
            'color_menu_icon' => ['required'],
            'color_login' => ['required'],
            'logo' => ['mimes:jpg,png,jpeg|max:2048'],
            'favicon' => ['mimes:jpg,png,jpeg,ico|max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome da empresa é obrigatório',
            'color_primary.required' => 'O campo cor primaria é obrigatório',
            'color_secondary.required' => 'O campo cor secundaria é obrigatório',
            'color_menu.required' => 'O campo cor de fundo é obrigatório',
            'color_menu_letter.required' => 'O campo cor das letras é obrigatório',
            'color_menu_letter_active.required' => 'O campo cor das letras ativas é obrigatório',
            'color_menu_title.required' => 'O campo cor dos titulos é obrigatório',
            'color_menu_icon.required' => 'O campo cor dos icones é obrigatório',
            'color_login.required' => 'O campo cor de fundo é obrigatório',
        ];
    }
}
