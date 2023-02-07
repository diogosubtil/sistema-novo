<?php

namespace App\Http\Requests;

use App\Models\Unidade;
use Illuminate\Foundation\Http\FormRequest;

class UnidadesFormRequest extends FormRequest
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
            'cnpj' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:255'],
            'dataAbertura' => ['required', 'string', 'max:255'],
            'meta' => ['required', 'integer'],
            'gerente' => ['required', 'integer', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'integer'],
            'timezone' => ['required', 'string', 'max:255'],
            'assinatura' => ['required', 'string'],
        ];
    }
}
