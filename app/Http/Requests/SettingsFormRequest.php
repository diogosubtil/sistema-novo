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
}
