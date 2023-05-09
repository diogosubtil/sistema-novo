<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesFormRequest extends FormRequest
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
            'scheduling' => $this->request->get('typeScheduling') == 'specific' && $this->request->get('type') == 'scheduling' ? ['required'] : [''],
            'type' => ['required'],
            'startDate' => $this->request->get('type') == 'contract' ? ['required'] : [''],
            'endDate' => $this->request->get('type') == 'contract' ? ['required'] : [''],
            'typeScheduling' => $this->request->get('type') == 'scheduling' ? ['required'] : [''],
            'text' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'scheduling.required' => 'O campo Agendamento é obrigatório',
            'type.required' => 'O campo Tipo é obrigatório',
            'startDate.required' => 'O campo Data de início é obrigatório',
            'endDate.required' => 'O campo Data de término é obrigatório',
            'typeScheduling.required' => 'O campo Tipo de agendamento é obrigatório',
            'text.required' => 'O campo Texto é obrigatório'
        ];
    }
}
