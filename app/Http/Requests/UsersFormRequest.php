<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;


class UsersFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'funcao' => ['required', 'integer', 'max:255'],
            'telefone' => ['required', 'string'],
            'unidade_id' => ['required'],
            'treinamento' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
            'funcao.required' => 'O campo função é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'unidade_id.required' => 'O campo unidades de acesso é obrigatório',
            'treinamento.required' => 'O campo treinamento é obrigatório',
        ];
    }
}
