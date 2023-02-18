<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportsFormRequest extends FormRequest
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
            'subject' => ['required', 'max:50'],
            'description' => ['required'],
            'user' => ['required'],
            'unidade_id' => ['required'],
            'status' => ['required'],
        ];
    }
}
