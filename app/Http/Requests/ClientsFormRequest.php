<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientsFormRequest extends FormRequest
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
            'nome' => ['required', 'string','max:255'],
            'sexo' => ['required', 'string','max:255'],
            'estado_civil' => ['required', 'string','max:255'],
            'dataNascimento' => ['required', 'string','max:255'],
            'cpf' => ['required', 'unique:clients', 'string','max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'sexo.required' => 'O campo sexo é obrigatório',
            'estado_civil.required' => 'O campo estado civil é obrigatório',
            'dataNascimento.required' => 'O campo data de nascimento é obrigatório',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.unique' => 'Este CPF já está sendo utilizado.'
        ];
    }
}
