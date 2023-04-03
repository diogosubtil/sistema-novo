<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportsAnswersFormRequest extends FormRequest
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
            'support_id' => ['required'],
            'user' => ['required'],
            'unidade_id' => ['required'],
            'answer' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'user.required' => 'O campo usuario é obrigatório',
            'unidade_id.required' => 'O campo unidade é obrigatório',
            'answer.required' => 'O campo resposta é obrigatório',
        ];
    }
}
