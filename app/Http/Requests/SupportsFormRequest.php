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
            'status' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'subject.required' => 'O campo assunto é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
            'user.required' => 'O campo usuario é obrigatório',
            'unidade_id.required' => 'O campo unidade é obrigatório',
            'status.required' => 'O campo status é obrigatório',
        ];
    }
}
